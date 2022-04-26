<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Follow;

class UsersController extends Controller

{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
    $search = \DB::table('users')->get();
        return view('users.search',['search'=>$search]);
    }

    public function searchResult(Request $request){
        $keyword = $request->input('search');

        $query = User::query();
        if (!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        $search = $query->get();

        return view('users.search',['search'=>$search,'keyword'=>$keyword]);
    }

    public function create(Request $request)
    {
        $id = $request->input('user_id');
        \DB::table('follows')->insert([
            'following_id' => Auth::user()->id,
            'followed_id'  => $id
        ]);

        return redirect('/search');
    }

    public function delete(Request $request)
    {
        $id = $request->input('user_id');
        Follow::where('following_id', Auth::user()->id)->where('followed_id',$id)->delete();

        return redirect('/search');
    }


    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function updateProfile(Request $request)
    {
        $user_form = $request->all();
        $user = Auth::user();

        unset($user_form['_token']);

        if(isset($user_form['password'])){
            $user_form['password']=bcrypt('password');
        }

        $user->fill($user_form)->save();

        return redirect('/top');
    }
}
