<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class Register extends Component
{
    public string $name;
    public string $email;
    public string $password;

    protected array $rules = [
        'name' => 'required|string|min:4|max:255',
        'email' => 'unique:users,email|required|email:dns',
        'password' => 'required|string|min:6|max:255',
    ];
    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.index');
    }

    public function register()
    {
        $this->validate();

        $newUser = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        if ($newUser){
            session()->flash('message', 'Successful Registration');

            return $this->redirect(RouteServiceProvider::HOME);
        }

        return session()->flash('error', 'Registration Failed. Please try again');
    }
}
