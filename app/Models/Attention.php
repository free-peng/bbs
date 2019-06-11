<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $fillable = ['user_id', 'attention_user_id'];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function attentionUser()
    {
        return $this->belongsTo(User::class, 'attention_user_id');
    }
}
