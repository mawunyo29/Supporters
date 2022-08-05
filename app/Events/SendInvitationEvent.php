<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendInvitationEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $auth;
    public $accept = false;
    public $decline_request = false;
    public $accept_request = false;
   public $notifiable;
    public $message ;

  
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user ,$auth, $message)
    {
        $this->user = $user;
        $this->auth = $auth;
        $message = $this->auth->name.' sent you a friend request';
        $this->message = $message;
        $this->notifiable = $this->user;
       
        
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('private.sendinvitation.'.$this->user->id);
    }
    
    public function broadcastAs()
    {
        return 'send.invitation';
    }
   
    
    public function broadcastWith()
    {
       
        return [
            'user' => $this->user->name,
            'auth' => $this->auth->name, 
            'message' => $this->message,
            
        ];
    }


}

// Compare this snippet from app\Http\Livewire\Back\NotificationController.php:
// <?php