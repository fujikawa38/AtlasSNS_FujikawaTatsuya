<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follow;

class UsersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(){
        $users = User::where('id', '!=', Auth::user()->id )->get();
        return view('users.search', compact('users'));
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

    // public function user()
    // {
    //     $users = User::get();
    //     return view('users.search', ['users'=>$users]);
    //     //$follows = Follow::get();
    //     //return view('users.search', compact('users'));
    //     // return view('users.search')->with(['users' => $users, 'follows' => $follows,]);
    //     //return view('users.search')->with(['users', 'follows']);
    // }
}
