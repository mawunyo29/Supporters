<?php

namespace App\Listeners;

use App\Events\SendInvitationEvent;
use App\Notifications\FriendInviteNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendInviteNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param  SendInvitationEvent  $event
     * @return void
     */
    public function handle(SendInvitationEvent $event)
    {
        $user = $event->user;
        $auth = $event->auth;
        $event->message;
        $event->notifiable;
       
        $user->notify(new FriendInviteNotification($auth));
    }
}
// Compare this snippet from app\Http\Livewire\Back\NotificationController.php: