<?php

namespace App\Http\Livewire\Back\NotificationComponents;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountUnReadNotification extends Component
{
    public $showNewUserNotification = false;
   public function mount(){
        
   }
    protected $listeners = ["sendNotification" => 'notifyNewUser'];
   
    public function notifyNewUser()
    {
        
        $this->showNewUserNotification = true;
    }

    public function render()
    {
        $user = Auth::user();
        return view('livewire.back.notification-components.count-un-read-notification', [
            'notifications' => $user->unReadNotifications,
            'user' => $user,
        ]);
    }
}
