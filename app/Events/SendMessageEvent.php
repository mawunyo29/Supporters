<?php

namespace App\Events;

use App\Models\Friend;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;
    public $user;
    public $friend;
    public function __construct($message ,$user ,$friend)
    {
        $this->message = $message;
        $this->user = $user;
        $this->friend = $friend;
    }
  
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $friends = Friend::where('user_id', $this->user->id)->orwhere('friend_id', $this->user->id)->get();
        $channels = [];
        foreach ($friends as $friend) {
            $channels[] = new PresenceChannel('presence.message.'. $friend->id);
        }
        return $channels;
       
    }
    public function broadcastAs()
    {
        return 'send.message';
    }
    public function broadcastWith()
    {
       
        return [
            'message' => $this->message,
            'user' => $this->user->only(['name','avatar','id']),
        ];
    }
}
