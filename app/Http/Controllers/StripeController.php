<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\Pendingorder ;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public $stripe ;

    public function __construct()
    {

        $this->stripe = new StripeClient(
            config('stripe.api_key.secret')
        ) ;

    }

    public function pay(Request $request)
{
    $YOUR_DOMAIN = config('app.domain');
    $user_id = Auth::id();

    // ✅ نجيب محتويات السلة بدل الـ orderdetails
    $cartItems = \App\Models\Cart::with('product')->where('user_id', $user_id)->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['error' => 'Your cart is empty.'], 400);
    }

    $lineItems = [];

    foreach ($cartItems as $item) {
        $product = $this->stripe->products->create([
            'name' => $item->product->name,
        ]);

        $price = $this->stripe->prices->create([
            'unit_amount' => $item->product->price * 100, // السعر بـ سنتات
            'currency' => 'usd',
            'product' => $product->id,
        ]);

        $lineItems[] = [
            'price' => $price->id,
            'quantity' => $item->quantity,
        ];
    }

    $checkout_session = $this->stripe->checkout->sessions->create([
        'shipping_options' => [
            [
                'shipping_rate_data' => [
                    'type' => 'fixed_amount',
                    'fixed_amount' => [
                        'amount' => 100,
                        'currency' => 'usd'
                    ],
                    'display_name' => 'Next day air',
                    'delivery_estimate' => [
                        'minimum' => [
                            'unit' => 'business_day',
                            'value' => 2
                        ],
                        'maximum' => [
                            'unit' => 'business_day',
                            'value' => 4
                        ]
                    ]
                ]
            ]
        ],
        'mode' => 'payment',
        'ui_mode' => 'embedded',
        'return_url' => $YOUR_DOMAIN . '/StoreOrder?session_id={CHECKOUT_SESSION_ID}',
        'line_items' => $lineItems,
    ]);

    // ✅ نحفظ الطلب المعلق (Pending Order)
    $pendingOrder = new PendingOrder();
    $pendingOrder->name       = $request->name;
    $pendingOrder->email      = $request->email;
    $pendingOrder->phone      = $request->phone;
    $pendingOrder->address    = $request->address;
    $pendingOrder->note       = $request->note;
    $pendingOrder->user_id    = $user_id;
    $pendingOrder->session_id = $checkout_session->id;
    $pendingOrder->save();

    return response()->json([
        'clientSecret' => $checkout_session->client_secret,
        'sessionId'    => $checkout_session->id,
    ]);
}

}
