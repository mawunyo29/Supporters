<?php

namespace App\Http\Livewire\Back;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationController extends Component
{
    public $user;
    public $diff_days;

    public function mount()
    {
        $this->user= Auth::user();
       
    }

    public function render()
    {
        return view('livewire.back.notification-controller');
    }
}
