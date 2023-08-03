<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public string $password;
    public string $email;

    protected array $rules = [
        'password' => 'required|min:6',
        'email' => 'required|email:dns|exists:users,email',
    ];

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.home');
    }

    public function login()
    {
        $validated = $this->validate();

//        $credentials = [
//            'email' => $this->email,
//            'password' => $this->password
//        ];

        if (Auth::attempt($this->validated())) {
            session()->flash('message', 'Successful Login');

            return $this->redirect(RouteServiceProvider::HOME);
        };

        return session()->flash('error', 'Invalid password and email combination');
    }
}
