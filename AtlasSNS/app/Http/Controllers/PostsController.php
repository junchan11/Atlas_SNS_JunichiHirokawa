<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){

        $list = Post::get();
        return view('posts.index',['list'=>$list]);

    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $id = $request->input('user-id');
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $id

        ]);

        return redirect('/top');
    }




    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    public function show()//カリキュラム参照　簡易SNS開発②
    {
        $following_id = Auth::user()->follows()->pluck('followed_id');


        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();//whereIn('user_id',$following_id)は指定したカラムの中に値が含まれているか。（'カラム名',値）　get()そのまま抽出

        return view('follows.followList',compact('posts'));
    }

    public function show_list()
    {
        $following_id = Auth::user()->followers()->pluck('following_id');

        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();


        return view('follows.followerList', compact('posts'));
    }

    public function updatePost(Request $request){

        $validateDate = $request->validate([
            'upPost' => 'max:150'
            ]);

        $id = $request->input('id');
        $up_post = $request->input('upPost');
        Post::query()
        ->where('id', $id)
        ->update(
        ['post' => $up_post]
        );

        return redirect('/top');

    }


    }
