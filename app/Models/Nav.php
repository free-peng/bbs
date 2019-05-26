<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table = 'nav';

    protected $fillable = ['name', 'url', 'sequence'];
}
