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
//     return view('TopController@index');
// });

Route::get('/','TopController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/top','TweetsController@index');

Route::get('/ather_user{user}','Ather_userController@index');
// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'UsersController',['only' => ['index', 'create' , 'store' ,'show']]);

    //フォロー関係
    Route::get('/ather_user{user}/follow', 'Ather_userController@follow')->name('follow');
   Route::get('/ather_user{user}/unfollow', 'Ather_userController@unfollow')->name('unfollow');

   // ツイート関連
    Route::resource('tweets', 'TweetsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
});
