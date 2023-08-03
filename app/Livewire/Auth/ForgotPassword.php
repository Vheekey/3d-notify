<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Str;
use Livewire\Component;

class ForgotPassword extends Component
{
    public string $resetEmail;

    protected array $rules = [
        'resetEmail' => 'required|email:dns|exists:users,email',
    ];

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->layout('layouts.index');
    }

    public function resetPassword()
    {
        $this->validate();

        $newPassword = Str::random(10);
        $passwordUpdated = User::where('email', $this->resetEmail)
            ->update(['password' => bcrypt($newPassword)]);

        if ($passwordUpdated) {
            $title = "New Password Received";
            $content = "Your new Password is $newPassword";
            User::where('email', $this->resetEmail)->notify(new UserNotification($title, $content));

            return session()->flash('message', 'New Password sent to your email');
        }

        return session()->flash('error', 'Reset failed. Try again');
    }
}
