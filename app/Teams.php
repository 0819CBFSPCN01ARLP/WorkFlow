<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Teams extends Model
{
    public function users()
    {
        return $this->hasMany('App\User',"team_id");
    }
}
