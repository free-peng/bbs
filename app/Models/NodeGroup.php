<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NodeGroup extends Model
{
    public function nodes()
    {
        return $this->hasMany(Node::class, 'group_id');
    }
}
