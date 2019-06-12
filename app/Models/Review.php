<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //评论表
    protected $fillable = ['topic_id','user_id', 'content'];

    public function topic()
    {
        return $this->belongsTo(Topics::class, 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
