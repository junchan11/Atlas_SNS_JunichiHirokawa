<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Follow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


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

        $user = Auth::user();

        $validateDate = $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => ['required|string|email|min:5|max:40',Rule::unique('users')->ignore($user->id)],
            'password' => 'required|string|min:8|max:20|confirmed',
            'password_confirmation' => 'required|string|min:8|max:20',
            'bio' => 'max:150',
            'img' => 'image'
            ]);


        $user->update([
            'username' => $request->input('username'),
            'email' => $request->input('mail'),
            'password' => bcrypt($request->input('password')),
            'bio' => $request->input('bio'),
        ]);
        $bio = $request->input('bio');
        // dd($bio);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('public');
            $user->images = basename($image);

            $user->update();
        }

        return redirect('/top');

    }

}
