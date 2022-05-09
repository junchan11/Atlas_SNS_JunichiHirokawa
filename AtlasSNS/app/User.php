<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;//Post::classを使えるようにしている


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function post()
    {
        return $this->hasMany(Post::class);
    }
//hasManyメソッドを使用して、Postモデルと【1対多】のリレーションを定義

public function followers()//Userテーブル内で多対多を行うから、User.php内に二つ記述がある
    {
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');//belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブル内で対応しているID名', '関係するモデルで対応しているID名');  self::classは今いるモデルが入る。ここだとUser.php
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');

    }

// フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
        //booleanは真偽を判定指定て、$this->follows()はuser.phpのfollowメソッドにアクセスしている。
        //where('followed_id', $user_id)->first(['follows.id'])ではfollowsメソッドで指定した中間テーブル（follows）の'followed_id'(followsテーブルのレコードの値)と$user_id(全ユーザーID)が一致したらfirst(['follows.id']) followsテーブルのidを処理する
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }


    public function getFollowCount($user_id)
    {
        return $this->follows()->where('following_id', $user_id)->count();//followsテーブルのfollowing_idとlogin.bladeのgetFollowCount(Auth::id())から送られてきた値が同じものをカウントしている
    }

    public function getFollowerCount($user_id)
    {
        return $this->followers()->where('followed_id', $user_id)->count();
    }


}
