<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'content',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

