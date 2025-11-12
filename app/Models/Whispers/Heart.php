<?php

namespace App\Models\whispers;

use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    //
        public function post()
    {
    return $this->belongsTo(Post::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
