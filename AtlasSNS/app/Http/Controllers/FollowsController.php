<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){

        $following_id = Auth::user()->follows()->pluck('followed_id');

        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
//whereIn('user_id',$following_id)は指定したカラム(第一)の中に値(第二)が含まれているか。（'カラム名',値）　get()そのまま抽出
        //postsテーブルをメインで使ってる。whereInは配列
        $users=User::whereIn('id',$following_id)->get();
        //usersテーブルをメインで使ってる
        return view('follows.followList',compact('posts','users'));
    }
    public function followerList(){

        $following_id = Auth::user()->followers()->pluck('following_id');

        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
        //postsテーブルをメインで使ってる。
        $users=User::whereIn('id',$following_id)->get();
        //usersテーブルをメインで使ってる
        return view('follows.followerList', compact('posts','users'));
    }

    public function show($id){
        //$idで選択したidを取ってきているので、idを取ってくる記述は不要

        $posts = Post::with('user')->where('user_id',$id)->latest()->get();

        $user=User::find($id);
        //userテーブルから＄idで取ってきたidを単一で選択している


        return view('posts.show',compact('posts','user'));
    }




}
