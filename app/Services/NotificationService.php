<?php
namespace App\Services;

use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\NewOrderPlaced;
use App\Notifications\UserRegistered;

class NotificationService
{
    public function notifyAdminsOfNewOrder($order)
    {
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewOrderPlaced($order));
    }

    public function notifyAdminsOfNewUser($user)
    {
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new UserRegistered($user));
    }

    public function notifyUserOrderPlaced($user, $order)
    {
        // $user->notify(new NewOrderPlaced($order));
    }

}
