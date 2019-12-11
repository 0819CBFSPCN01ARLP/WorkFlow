<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Teams extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
