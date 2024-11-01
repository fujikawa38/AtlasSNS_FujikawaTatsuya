<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Post;

class PostsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $id)->orWhere('user_id', Auth::id())->latest('updated_at')->get();
        return view('posts.index', compact('posts'));
    }

    public function post(Request $request){
        $post = $request->input('post');
        Post::create(['user_id' => Auth::user()->id, 'post' => $post]);
        return redirect('/top');
    }

    public function postDelete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function postUpdate(Request $request){
        $id = $request->input('id');
        $update = $request->input('postUpdate');
        Post::where('id', $id)->update([
            'post' => $update
        ]);
        return redirect('/top');
    }

    public function show(){
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('followed_id', $following_id)->get();
        return view('follows.followList', compact('posts'));
    }
}
