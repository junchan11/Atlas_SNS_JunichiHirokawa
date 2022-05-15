<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){

        $list = Post::latest()->get();
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
