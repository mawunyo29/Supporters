<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        "provider_id",
        "provider_token",
        "provider_token_refresh",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Get the user's freinds.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friends()
    {
        return $this->belongsToMany(Friend::class)->withPivot('user_id', 'friend_id');
    }

    /**
     * Get the user's friend requests.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function friendRequests()
    // {
    //     return $this->hasMany(FriendRequest::class, 'user_id', 'id');
    // }

    /**
     * Get the user's friend requests.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function friendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id', 'id');
    }
    /**
     * search user by name
     * @param  string $name
     */
    public static function search($name)
    {
        return User::where('name', 'like', '%' . trim($name) . '%')->whereNotIn('id', collect(Auth::user()->id))->get();
    }


    public function receivesBroadcastNotificationsOn()
    {
        return 'private.sendinvitation.' . $this->id;
    }
    /**
     *  is frind with user
     */
  
    public function isFriendWith(User $user)
    {
        return (bool) $this->friends()->where('friend_id', $user->id)->count();
    }
  
    
}
