<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

  protected $guarded=[];
    /**
     *  video relationship
     */
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
    /**
     *  user relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     *  tags relationship
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    /**
     *  comments relationship
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
}
