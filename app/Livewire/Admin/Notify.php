<?php

namespace App\Livewire\Admin;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notify extends Component
{
    public $notifications;

    public function render()
    {
        $this->notifications = DatabaseNotification::all();
        return view('livewire.admin.notify');
    }
}
