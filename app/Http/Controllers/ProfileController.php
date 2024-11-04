<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $profiles = User::where('id', Auth::id())->get();
        return view('profiles.profile', compact('profiles'));
    }

    public function viewProfile($id){
        $profiles = User::where('id', $id)->get();
        $posts = Post::with('user')->where('user_id', $id)->latest('updated_at')->get();
        return view('profiles.profile', compact('profiles', 'posts'));
    }
}
