<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class EditController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function editPost(Request $form, $id)
  {
  	$where = $form["where"];
  	$post = Posts::find($id);
   	return view('layouts.edit-post', compact("post","where"));
  }

  public function editPostedit(Request $form)
  {
   	$post = Posts::find($form["id"]);
   	$where = $form["where"];

   	
    $post->text=$form["text"];

    // Para guardar la imagen uso estas dos ĺineas
    $imagen = $form->file("image");
    if ($imagen != null) {
       $ruta = $imagen->store("public");
       $nombreImagen = basename($ruta);
       $post->image=$nombreImagen;
    }

   	$post->save();
    return redirect($where);
  }
}
