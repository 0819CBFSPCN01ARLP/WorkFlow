<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPost(Request $req) {
      $newPost = new Posts();

      $newPost->text=$req['text'];
      $newPost->image=$req['image'];
      $newPost->user_id=Auth::user()->id;

      $newPost->save();

      return redirect($req["where"]);

    }

    public function deletePost(Request $request) {
      $id = $request["id"];
      $post = Posts::find($id);
      $post->delete();
      return redirect($request["where"]);
    }


}
