<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Profile;
use App\User;
use Auth;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function teamView($id){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $teams = Teams::find($id);
        // $users = User::where('team_id', $id)->get();
        $users = $teams->users;
        $team_id = $id;
        return view('layouts/teams',compact("profile","team_id","teams","users"));
    }


}
