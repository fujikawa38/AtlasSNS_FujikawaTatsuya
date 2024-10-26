<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Follow;

class FollowsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList(){
        $followings = Follow::where('following_id', Auth::user()->id)->get('followed_id');
        return view('follows.followList', compact('followings'));
    }

    public function followerList(){
        $followers = Follow::where('followed_id', Auth::user()->id)->get('following_id');
        return view('follows.followerList', compact('followers'));
    }

    // public function following() {
    // $followings = Follow::where('following_id', 'Auth::user()->id')->get();
    // return view('follows.followerList', ['follows'=>$followings]);
    // }
 }
