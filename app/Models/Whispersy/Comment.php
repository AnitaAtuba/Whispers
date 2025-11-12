<?php

namespace App\Models\whispers;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

        public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
