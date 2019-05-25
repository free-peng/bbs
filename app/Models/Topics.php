<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    public function group()
    {
        return $this->belongsTo(NodeGroup::class, "group_id");
    }
}
