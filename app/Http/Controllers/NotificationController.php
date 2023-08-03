<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotification;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function createNotification(CreateNotification $request)
    {
        $users = User::whereIn('email', $request->emails)->get();

        Notification::send($users, new UserNotification($request->title, $request->message, $request->scheduled));

        return response()->json(['message' => 'Notification Scheduled']);
    }

    public function readNotification()
    {

    }

    public function updateNotification()
    {

    }

    public function deleteNotification()
    {

    }
}
