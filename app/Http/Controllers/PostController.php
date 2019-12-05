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

      $reglas = [
        "text" => "string|min:1",
      ];

      $mensajes = [
        "string" => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute debe tener contenido"
      ];

      $this->validate($req, $reglas, $mensajes);

      $newPost->text=$req['text'];
      // Para guardar la imagen uso estas dos ĺineas
      $imagen = $req->file("image");
      if ($imagen != null) {
         $ruta = $imagen->store("public");
         $nombreImagen = basename($ruta);
         $newPost->image=$nombreImagen;
      }
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
