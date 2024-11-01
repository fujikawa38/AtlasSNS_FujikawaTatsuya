<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follow;

class FollowsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList(){
        $followings = User::where('id', '!=', Auth::user()->id)->get();
        return view('follows.followList', compact('followings'));
    }

    public function followerList(){
        $followers = User::where('id', '!=', Auth::user()->id)->get();
        return view('follows.followerList', compact('followers'));
    }

    public function add($id){
        Follow::create(['following_id' => Auth::user()->id, 'followed_id' => $id]);
        return redirect('/search');
    }

    public function cancel($id){
        $follow = Follow::where('following_id', Auth::user()->id)->where('followed_id', $id)->first();
        Follow::where('id', $follow->id)->delete();
        return redirect('/search');
    }


    // public function cancelFollow(Request $request){
    //     $following = $request->input('cancelFollow');
    // }

    // public function following() {
    // $followings = Follow::where('following_id', 'Auth::user()->id')->get();
    // return view('follows.followerList', ['follows'=>$followings]);
    // }
 }
