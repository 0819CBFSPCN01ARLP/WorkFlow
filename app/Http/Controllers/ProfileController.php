<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Profile;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function profile()
  {
    return view('layouts.profile');
  }
}
