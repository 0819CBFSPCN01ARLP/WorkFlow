<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Profile;
use App\Teams;
use Auth;
class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile($id)
  {
  		$user = User::find((int)$id);
      $posts = $user->posts;

      $profile = Profile::where('user_id', $id)->first();
      $profileIndex = Profile::where('user_id', Auth::user()->id)->first();
      $team = Teams::where('id', $user->team_id)->first();

  		$profile_id = $id;
    	return view('layouts.profile', compact("posts","profile_id", "profile","team","profileIndex"));
  }

  public function editImg(Request $req)
  {
      $profile = Profile::where('user_id', Auth::user()->id)->first();
      if( $profile == null){
        $profile = new Profile();
        $profile->user_id=Auth::user()->id;
        $profile->username="default";
        $profile->birthday_date="2019-12-12 16:07:19";
      }

      $imagen = $req->file("image");
      if ($imagen != null) {
         $ruta = $imagen->store("public");
         $nombreImagen = basename($ruta);
         $profile->image=$nombreImagen;
      }

      $profile->save();
      return redirect('/profile/'.$profile->user_id);

  }

}
