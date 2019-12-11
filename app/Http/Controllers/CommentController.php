<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addComment(Request $req) {
      $newComment = new Comment();

      $reglas = [
        "text" => "string|min:1",
      ];

      $mensajes = [
        "string" => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute debe tener contenido"
      ];

      $this->validate($req, $reglas, $mensajes);

      $newComment->text=$req['text'];
      // Para guardar la imagen uso estas dos ĺineas
      $imagen = $req->file("image");
      if ($imagen != null) {
         $ruta = $imagen->store("public");
         $nombreImagen = basename($ruta);
         $newComment->image=$nombreImagen;
      }
      $newComment->user_id=Auth::user()->id;
      $newComment->post_id=$req["post_id"];

      $newComment->save();

      return redirect('/');

    }

    //public function deleteComment(Request $request) {
    //  $id = $request["id"];
    //  $post = Comments::find($id);
    //  $post->delete();
    //  return redirect('/');
    //}

}
