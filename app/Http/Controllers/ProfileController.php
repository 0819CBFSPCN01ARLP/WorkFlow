<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile()
  {
    $posts = Posts::All();
    return view('layouts.profile', compact("posts"));
  }
}
