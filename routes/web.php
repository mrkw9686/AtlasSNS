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


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {

Route::get('/top','PostsController@index');

Route::post('/post/create','PostsController@create');

Route::post('/post/update', 'PostsController@update');

Route::get('/post/{id}/delete','PostsController@delete');

Route::get('/profile/{id}','UsersController@profile');

Route::get('/myprofile','UsersController@myprofile');
Route::post('/myprofile','UsersController@myprofile');

Route::post('/up_profile','UsersController@up_profile');

Route::get('/search','UsersController@search');
Route::get('/search/select','UsersController@select');

Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','followsController@followerList');

Route::post('/users/follow', 'FollowsController@follow');
Route::post('/users/unfollow', 'FollowsController@unfollow');

Route::get('/logout', 'Auth\LoginController@logout');
});
