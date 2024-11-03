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

    public function search(Request $request){   //get送信でも$request利用可能？
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('id', '!=', Auth::user()->id)->where('username', 'like', '%'.$keyword.'%')->get();
        } else {
            $users = User::where('id', '!=', Auth::user()->id )->get();
        }

        return view('users.search', compact('keyword', 'users'));
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
