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
        $follows = Follow::get();
        return view('users.search', compact('users', 'follows'));
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
