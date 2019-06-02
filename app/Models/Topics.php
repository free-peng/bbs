<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
