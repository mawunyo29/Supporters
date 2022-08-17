<?php

namespace App\Models;

use App\Notifications\FriendInviteNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Friend extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'user_id', 'name', 'avatar', 'is_online', 'is_blocked','is_friend_id'
    // ];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_online' => 'boolean',
        'is_blocked' => 'boolean',
    ];
    /**
     * Get the user that owns the friend.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->using(FriendUser::class);;
    }
    /**
     * Get the friend that owns the user.
     */
    public function friend_users(){
        
        return $this->hasMany(FriendUser::class);
    }
    /**
     * sender
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    /**
     * receiver
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    
    /**
     * Get the messages for the friend.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    /**
     * Get the messages for the friend.
     */
    public function getAvatarAttribute($value)
    {
        return $value ?: 'https://api.adorable.io/avatars/285/'.$this->name.'.png';
    }
    /**
     * Get the messages for the friend.
     */
    public function getIsOnlineAttribute($value)
    {
        return $value ? 'Online' : 'Offline';
    }
    /**
     * Get the messages for the friend.
     */
    public function getIsBlockedAttribute($value)
    {
        return $value ? 'Blocked' : 'Unblocked';
    }
    /***
     * block friend
     */
    public function block()
    {
        $this->is_blocked = true;
        $this->save();
    }
    /**
     * unblock friend
     */
    public function unblock()
    {
        $this->is_blocked = false;
        $this->save();
    }
    /**
     * friend request send notification
     */
    public function sendFriendRequestNotification($user, $message)
    {
        $this->notify(new FriendInviteNotification($user, $message));
    }
    public function notification()
    {
        return $this->DatabaseNotification::firstWhere('notifiable_id', $this->id);
    }

    public function getNotificationAttribute()
    {
        return $this->notification()->read_at;
    }

    public function getNotificationCountAttribute()
    {
        return $this->notification()->unread;
    }

    public function getNotificationCount()
    {
        return $this->notification()->unread;
    }

    public function getNotification()
    {
        return $this->notification()->read_at;
    }

    public function markAsRead()
    {
        $this->notification()->update(['read_at' => now()]);
    }

    public function markAsUnread()
    {
        $this->notification()->update(['read_at' => null]);
    }

    public function addNewFriend($user_id)
    {
        $this->user_id = $user_id;
        $this->save();
    }

    /**
     * Get user's friend.
     */
    public static function getUserFriend($user_id)
    {
        return self::where(function($query) use ($user_id){
            $query->where('sender_id', $user_id)
                ->orWhere('receiver_id', $user_id);
        })->where('is_accept', 1)->get();
       
    }


}
