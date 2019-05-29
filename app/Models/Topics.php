<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    public function group()
    {
        return $this->belongsTo(NodeGroup::class, "group_id");
    }

    public function nodes()
    {
        return $this->belongsTo(Node::class, 'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
