<?php

namespace App\Livewire\Auth;

use App\Models\User;
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
            ->layout('layouts.home');
    }

    public function resetPassword()
    {
        $this->validate();

        $newPassword = Str::random(10);
        $passwordUpdated = User::where('email', $this->resetEmail)
            ->update(['password' => bcrypt($newPassword)]);

        if ($passwordUpdated){
            //notification send email

//            return session()->flash('message', 'New Password sent to your email');
            return session()->flash('message', 'New Password sent to your email'.$newPassword);
        }

        return session()->flash('error', 'Reset failed. Try again');
    }
}
