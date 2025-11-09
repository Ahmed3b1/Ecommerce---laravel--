<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class NotificationController extends Controller
{
    /**
     * عرض جميع الإشعارات الخاصة بالمستخدم الحالي
     */
    public function index()
    {
        $notifications = Auth::user()
            ->notifications()
            ->latest()
            ->paginate(10); // ← كل صفحة فيها 10 إشعارات

        return view('notifications.index', compact('notifications'));
    }


    /**
     * عرض الإشعارات غير المقروءة فقط
     */
    public function unread()
    {
        $notifications = Auth::user()->unreadNotifications;

        return view('notifications.unread', compact('notifications'));
    }

    /**
     * تحديد إشعار واحد كمقروء
     */
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'تم تحديد الإشعار كمقروء ✅');
    }

    /**
     * تحديد جميع الإشعارات كمقروءة
     */
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'تم تحديد جميع الإشعارات كمقروءة ✅');
    }

    /**
     * حذف إشعار
     */
    public function destroy($id)
    {
        $notification = Auth::user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->delete();
        }

        return redirect()->back()->with('success', 'تم حذف الإشعار بنجاح 🗑️');
    }

    /**
     * حذف جميع الإشعارات
     */
    public function destroyAll()
    {
        Auth::user()->notifications()->delete();

        return redirect()->back()->with('success', 'تم حذف جميع الإشعارات 🗑️');
    }

    public function markAllAsReadAjax()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json(['status' => 'success']);
    }

    public function latest()
    {
        $notifications = Auth::user()->notifications()
            ->latest()
            ->take(5)
            ->get();

        return response()->json(['notifications' => $notifications]);
    }


}
