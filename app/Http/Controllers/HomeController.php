<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Teams;
use App\Profile;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $posts = Posts::All();
        $teams = Teams::All();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
      return view('home',compact("posts","teams","profile"));
    }

    public function aboutus(){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('layouts/aboutus',compact("profile"));
    }

    public function faq(){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('layouts/faqs',compact("profile"));
    }

    public function showTeamsFields()
    {
        $teams = Teams::all();
        return view('home',compact("teams"));
    }
}
