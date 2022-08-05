<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class FriendUser extends MorphPivot
{
    use HasFactory;
    public $incrementing = true;
    protected $guarded = [];
    /**
     * Get the user that owns the friend.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the friend that owns the user.
     */
    public function friend()
    {
        return $this->belongsTo(Friend::class);
    }

}
