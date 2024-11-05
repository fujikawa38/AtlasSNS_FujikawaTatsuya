<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList(){
        $followings = User::where('id', '!=', Auth::user()->id)->get();

        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->latest('updated_at')->get();

        return view('follows.followList', compact('followings', 'posts'));
    }

    public function followerList(){
        $followers = User::where('id', '!=', Auth::user()->id)->get();

        $followed_id = Follow::where('followed_id', Auth::user()->id)->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->latest('updated_at')->get();

        return view('follows.followerList', compact('followers', 'posts'));
    }

    public function add($id){
        Follow::create(['following_id' => Auth::user()->id, 'followed_id' => $id]);
        return back();
    }

    public function cancel($id){
        $follow = Follow::where('following_id', Auth::user()->id)->where('followed_id', $id)->first();
        Follow::where('id', $follow->id)->delete();
        return back();
    }


    // public function cancelFollow(Request $request){
    //     $following = $request->input('cancelFollow');
    // }

    // public function following() {
    // $followings = Follow::where('following_id', 'Auth::user()->id')->get();
    // return view('follows.followerList', ['follows'=>$followings]);
    // }
 }
