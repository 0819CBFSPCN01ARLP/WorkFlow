<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostController extends Controller
{
    public function addPost(Request $req) {
      $newPost = new Posts();

      $newPost->text=$req['text'];
      $newPost->image=$req['image'];

      $newPost->save();

      return "completado!";

    }
}
