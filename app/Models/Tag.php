<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'comment',
        'taggable_id',
        'taggable_type',
    ];
   
    /**
     * relationship
     */
    public function taggable()
    {
        return $this->morphTo(__FUNCTION__, 'taggable_type', 'taggable_id');
    }

}
