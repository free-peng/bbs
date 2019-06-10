<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo(Topics::class, "topic_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
