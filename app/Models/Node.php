<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ['name', 'group_id', 'alias','sequence'];

    public function group()
    {
        return $this->belongsTo(NodeGroup::class, "group_id");
    }
}
