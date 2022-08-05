<?php

namespace App\Http\Livewire\Back;

use App\Events\SendMessageEvent;
use Livewire\Component;

class ChatMessage extends Component
{
    public $message='';
    public $user;
    public $notifications;
    public $showNewUserNotification = false;
    public $is_open_send_invitation = true;
    public $user_to_add;
    public $taping = '';
    public $messages = [];
    public $current_user;

    public function mount($user)
    {
        $this->user = $user;
       
    }
    protected $listeners = ["sendNotification" => 'notifyNewUser',
    'notifyNewMessage','typingMessage'
];
    public function sendMessage()
    {
        $this->validate([
            'message' => 'required',
        ]);
         event(new SendMessageEvent($this->message ,$this->user));
       
    }

    public function notifyNewUser() 
    {
       
        $this->showNewUserNotification = true;
        $this->dispatchBrowserEvent('notifyNewMessage',$this->message);
        $this->dispatchBrowserEvent('typingMessage',$this->message);

    }
    // public function updatedMessage($proprety)
    // {
    //     $this->message = $proprety;
    //     event(new SendMessageEvent($this->message ,$this->user));
    // }
    public function typingMessage($typing,$user)
    {
       
            $this->dispatchBrowserEvent('typingMessage',$typing ,$user);
            $this->taping = $typing;
            if ($user) {
                $this->messages[]=['user'=>$user,'message'=>$typing];
            } 
          
            
       
    }
    public function chatMessage($message)
    {
        $this->message = $message;
       
        event(new SendMessageEvent($this->message ,$this->user));
    }
   
    public function  notifyNewMessage($message)
    {
        $this->message = $message;
        event(new SendMessageEvent($this->message ,$this->user));
    }
    public function render()
    {
        return view('livewire.back.chat-message');
    }
}
