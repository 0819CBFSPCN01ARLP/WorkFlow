<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile($id)
  {
  		$posts = User::find((int)$id)->posts;

  		$profile_id = $id;
    	return view('layouts.profile', compact("posts","profile_id"));
  }
}

