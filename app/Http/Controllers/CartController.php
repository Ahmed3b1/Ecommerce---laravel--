<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;


use App\Models\Cart ;
use App\Models\orderdetails ;
use App\Models\Pendingorder ;
use App\Models\Order ;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {

        $user_id = Auth::id() ;
        
        $cartProducts = Cart::with('Product')->where('user_id' , $user_id)->get() ;

        return view('Products.cart' , ['cartProducts' => $cartProducts]) ;
    }

    public function Completeorder() {

        $user_id = Auth::id() ;
        
        $cartProducts = Cart::with('Product')->where('user_id' , $user_id)->get() ;

        return view('Products.Completeorder' , ['cartProducts' => $cartProducts]) ;
    }

    public function previousorder() {

        $user_id = Auth::id() ;
        
        $result = Order::with('orderdetails')->where('user_id' , $user_id)->get() ;

        return view('Products.previousorder' , ['orders' => $result]) ;
    }

    public function StoreOrder(Request $request)
    {
        $session_id = $request->query('session_id');
        $pendingOrder = PendingOrder::where('session_id', $session_id)->first();

        if (!$pendingOrder) {
            Log::warning("⚠️ No pending order found for session {$session_id}");
            return redirect('/cart')->with('error', 'Order could not be completed.');
        }

        $newOrder = new Order();
        $newOrder->name = $pendingOrder->name;
        $newOrder->address = $pendingOrder->address;
        $newOrder->email = $pendingOrder->email;
        $newOrder->phone = $pendingOrder->phone;
        $newOrder->note = $pendingOrder->note;
        $newOrder->stripe_session_id = $pendingOrder->session_id;

        $user_id = Auth::id();
        $newOrder->user_id = $user_id;

        // ✅ نحاول نجيب السعر من الـ webhook لو وصل قبله
        $webhookOrder = \App\Models\PendingWebhook::where('session_id', $session_id)->first();
        if ($webhookOrder) {
            $newOrder->price = $webhookOrder->amount;
            $webhookOrder->delete(); // نحذف من الـ pending بعد ما استخدمناه
            Log::info("💰 Used pending webhook price for session {$session_id}");
        }

        $newOrder->save();

        // حفظ تفاصيل الطلب
        $cartProducts = Cart::with('Product')->where('user_id', $user_id)->get();
        foreach ($cartProducts as $item) {
            $newOrderDetail = new Orderdetails();
            $newOrderDetail->product_id = $item->product_id;
            $newOrderDetail->price = $item->product->price;
            $newOrderDetail->quantity = $item->quantity;
            $newOrderDetail->order_id = $newOrder->id;
            $newOrderDetail->save();
        }

        $pendingOrder->delete();
        Cart::where('user_id', $user_id)->delete();

        return redirect('/cart')->with('success', 'Order stored successfully.');
    }

}
