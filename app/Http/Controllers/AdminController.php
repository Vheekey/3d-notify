<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserRole;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createToken(Request $request)
    {
        $request->validate([
            'email' => 'required|string|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('admin');

        return response()->json(['token' => $token->plainTextToken]);
    }

    public function changeUserRole(ChangeUserRole $request)
    {
        $roleChanged = User::where('email', $request->email)
            ->update(['role' => $request->newRole]);

        if ($roleChanged) {
            return response()->json([
                "message" => "Successfully changed role of user {$request->email}"
            ]);
        }

        return response()->json(['message' => "Update Failed"], 400);
    }
}
