<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Topics extends Model
{
    protected $fillable = ['title','content','node_id','user_id'];


    public function nodes()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'topic_id');
    }

    public function comments()
    {
        return $this->hasMany(Review::class, 'topic_id');
    }

    public function collection()
    {
        return $this->hasMany(Review::class, 'topic_id');
    }

    /**
     * 用户作用域
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query)
    {
        return $query->where("user_id", Auth::id());
    }
}
