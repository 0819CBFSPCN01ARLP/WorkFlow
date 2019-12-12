<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //use SoftDeletes;

    function user(){
    	return $this->hasOne('App\User');
    }
}