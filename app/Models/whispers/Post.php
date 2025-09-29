<?php

namespace App\Models\whispers;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Whispers\Comment;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,'likes', 'post_id','user_id');
    }

    public function hearts(){
        return  $this->belongsToMany(User::class, 'hearts','post_id','user_id');
    }
}
