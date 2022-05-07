<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){

        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }



    public function show_list()
    {
        $following_id = Auth::user()->followers()->pluck('following_id');

        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();


        return view('follows.followerList', compact('posts'));
    }

}
