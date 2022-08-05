<?php

namespace App\Notifications;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class FriendInviteNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user ,$message)
    {
        $this->user = $user;
        $this->message = $message;
    }
  


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(Auth::user()->email, Auth::user()->name)
            ->subject('Invitation')
            ->greeting('Hello ' . $notifiable->name)
            ->line('You have been invited to join Supporters\'s community')
            ->action('Join', route('login'))
            ->line('Thank you for using our application!');
        // ->line('The introduction to the notification.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "name" => $this->user->name ,
            "user_id" => $this->user->id,
            "message" => $this->message,     
        ];
    }
    /**
     * use for broadcast notification
     */
   
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            "name" => $this->user->name ,
            "user_id" => $this->user->id,
            "message" => $this->message,            
        ]))->onConnection('database')
        ->onQueue('broadcasts');
    }
   
    public function broadcastType()
    {
        return 'broadcast.message';
    }
     
    
}
