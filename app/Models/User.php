<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function followings() {
        return $this->belongsToMany('App\Models\User', 'follows', 'following_id', 'followed_id');
    }

    public function followers() {
        return $this->belongsToMany('App\Models\User', 'follows', 'followed_id', 'following_id');
    }

    public function Posts(){
        return $this->hasMany('App\Models\Post');
    }

    //following_idのユーザーがフォローしているfollowed_idを抽出
    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    //Auth::userとの関係
    public function relation() {
        $id = $this->id;   //foreachで取得されるユーザーのusersテーブルのidを取得
        $follow = (boolean) Auth::user()->follows()->where('followed_id', $id)->first();   //following_idがAuth::userのidのときに、followed_idに取得したidが入っているレコードがあればtrue、なければfalse
        $follower = (boolean) $this->follows()->where('followed_id', Auth::user()->id)->first();   //following_idが取得したidのときに、followed_idにAuth::userのidが入っているレコードがあればtrue、なければfalse

        if(!($follow) && !($follower)){   //どちらもfalse、フォロー関係なし
            $result = 0;
        } elseif($follow && !($follower)){   //$followがtrue、自分が相手をフォロー
            $result = 1;
        } elseif(!($follow) && $follower){   //$followerがtrue、相手が自分をフォロー
            $result = 2;
        } else {   //どちらもtrue、相互フォロー
            $result = 3;
        }

        return $result;
    }
}
