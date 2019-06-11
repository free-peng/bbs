<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['user_id', 'topic->id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topics::class, 'topic_id');
    }
}
