<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

     protected $guarded=[];
     
     public function commentable()
     {
         return $this->morphTo(__FUNCTION__, 'commentable_type', 'commentable_id');
     }


}
