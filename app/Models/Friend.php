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
    protected $fillable = [
        'user_id', 'name', 'avatar', 'is_online', 'is_blocked',
    ];
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
    public function user()
    {
        return $this->belongsTo(User::class);
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
    public function sendFriendRequestNotification()
    {
        $this->notify(new FriendInviteNotification($this->user));
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


}
