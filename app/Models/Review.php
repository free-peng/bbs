<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function topic()
    {
        return $this->belongsTo(Node::class, 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
