<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');
Route::post('/post/search','UsersController@searchResult');

Route::get('/follow-list','PostsController@show');
Route::get('/follower-list','PostsController@show_list');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('post/create','PostsController@create');

Route::get('post/{id}/delete','PostsController@delete');

Route::post('/follow','UsersController@create');
Route::post('/unfollow','UsersController@delete');

Route::get('/show','FollowsController@show');

Route::post('/profile_edit','UsersController@updateProfile');

Route::post('/post_edit','PostController@updatePost')->name('updatePost');
