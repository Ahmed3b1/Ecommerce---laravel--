<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\PendingWebhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {

        Log::info('WEBHOOK HIT', ['headers' => $request->headers->all(), 'body' => $request->getContent()]);


        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = \Stripe\Checkout\Session::retrieve([
                'id' => $event->data->object->id,
                'expand' => ['line_items'],
            ]);

            $lineItems = $session->line_items->data;
            $totalAmount = 0;

            foreach ($lineItems as $item) {
                $totalAmount += $item->amount_total;
            }

            $totalAmount = $totalAmount / 100;

            Log::info('✅ Checkout session completed', [
                'session_id' => $session->id,
                'customer_email' => $session->customer_details->email ?? null,
                'amount' => $totalAmount
            ]);

            $order = Order::where('stripe_session_id', $session->id)->first();

            if ($order) {
                // ✅ الحالة الأولى: الطلب موجود بالفعل
                $order->price = $totalAmount;
                $order->save();
                Log::info("✅ Order {$order->id} updated with price: {$totalAmount}");
            } else {
                // ✅ الحالة الثانية: الطلب لسه ما اتخزنش → نحفظه مؤقتًا في pending_webhooks
                PendingWebhook::updateOrCreate(
                    ['session_id' => $session->id],
                    [
                        'amount' => $totalAmount,
                        'email' => $session->customer_details->email ?? null,
                    ]
                );
                Log::warning("⚠️ Order not found for session {$session->id}, stored temporarily.");
            }
        }

        return response('Webhook received', 200);
    }
}
