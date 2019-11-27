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

   	// Para guardar la imagen uso estas dos ĺineas
    $ruta = $form->file("image")->store("public");
    $nombreImagen = basename($ruta);

   	$post->text=$form["text"];
   	$post->image=$nombreImagen;
   	$post->save();
    return redirect($where);
  }
}
