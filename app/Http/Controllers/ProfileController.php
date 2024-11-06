<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function updateProfile(ProfileUpdateRequest $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('newPassword');
        $bio = $request->input('bio');
        $icon = $request->file('iconImage');

        User::where('id', $id)->update([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if (!empty($bio)) {
            User::where('id', $id)->update([
                'bio' => $bio,
            ]);
        }

        if (!empty($icon)) {
            $icon_image = $request->file('iconImage')->store('public');
            $icon_name = basename($icon_image);
            User::where('id', $id)->update([
                'icon_image' => $icon_name,
            ]);
        }

        return redirect('/profile');
    }
}
