<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewOrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    // قنوات الإرسال: database + broadcast + mail (حسب الحاجة)
    public function via($notifiable)
    {
        $channels = ['database'];
        if ($notifiable->wants_email_notifications ?? true) {
            $channels[] = 'mail';
        }
        if ($notifiable->prefers_realtime ?? false) {
            $channels[] = 'broadcast';
        }
        return $channels;
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'message' => "New Order Has Been Placed#{$this->order->id}",
            'amount' => $this->order->total,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("New Order#{$this->order->id}")
            ->line("Price Of New Order {$this->order->total}")
            ->action(' Order Show ', url("/admin/orders/{$this->order->id}"));
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'order_id' => $this->order->id,
            'message' => "New Order Has Been Placed#{$this->order->id}"
        ]);
    }
}
