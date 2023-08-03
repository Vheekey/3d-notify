<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotification;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function createNotification(CreateNotification $request)
    {
        $users = User::whereIn('email', $request->emails)->get();

        Notification::send($users, new UserNotification($request->title, $request->message, $request->scheduled));

        return response()->json(['message' => 'Notification Scheduled']);
    }

    public function readNotifications(): \Illuminate\Http\JsonResponse
    {
        $notifications = auth()->user()->notifications->all();

        return response()->json([
            'message' => "All Notifications",
            'data' => $notifications
        ]);
    }

    public function readUpdateNotification(DatabaseNotification $notification): \Illuminate\Http\JsonResponse
    {
        $this->updateNotification($notification);

        return response()->json([
            'message' => "Notification Marked as Read",
            'data' => $notification
        ]);
    }

    public function updateNotification(DatabaseNotification $notification)
    {
        $notification->update(['read_at' => now()]);
    }

    public function deleteNotification(DatabaseNotification $notification)
    {
        $notification->delete();

        return response()->json([
            'message' => "Notification Deleted Successfully",
        ]);
    }
}
