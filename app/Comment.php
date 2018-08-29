<?php

namespace App;

class Comment extends Model
{
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //reply to comment
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class)->latest();
    // }

}
