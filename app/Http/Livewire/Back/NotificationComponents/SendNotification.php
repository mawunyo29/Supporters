<?php

namespace App\Http\Livewire\Back\NotificationComponents;

use App\Models\User;
use Livewire\Component;

class SendNotification extends Component
{
    public $showNewUserNotification = false;
    public $open_new_user_notification = false;
    public $userId;
    public $message;
    public $user;

    public function mount($userId)
    {
        $this->userId = $userId->id;
        $this->user = User::findOrfail($this->userId);
    }
 
    // public function getListeners()
    // {
    //     return [
    //         "echo-private:private.sendinvitation.{$this->userId},.send.invitation" => 'notifyNewUser',
    //     ];
    // }
    protected $listeners = ["sendNotification" => 'notifyNewUser',
                            'notifyNewMessage'
                        ];
    public function notifyNewUser() 
    {
       
        $this->showNewUserNotification = true;
        $this->dispatchBrowserEvent('notifyNewMessage',$this->message);
    }
    public function  notifyNewMessage($message)
    {
        $this->message = $message;
       
    }
    
    public function render()
    {
        return view('livewire.back.notification-components.send-notification');
    }
}
