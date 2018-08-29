<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follower extends Model
{
    protected $fillable = ['follow_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}