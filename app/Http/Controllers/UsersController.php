<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(){
        return view('users.search');
    }

    public function index()
    {
        $users = User::get();
        return view('users.search', ['users'=>$users]);
    }
}
