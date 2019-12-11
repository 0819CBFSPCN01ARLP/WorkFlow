<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Comment extends Model
{

    // use SoftDeletes;
    // Para que funcione la eliminación de comentarios hay que agregar en la tabla de comentarios el field "deleted_ad".

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Posts', 'post_id', 'id');
    }
}