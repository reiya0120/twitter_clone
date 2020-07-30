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

Route::get('/ather_user{user}','Ather_userController@index');
// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::get('/login_user','login_userController@index');

    //フォロー関係
    Route::get('/ather_user{user}/follow', 'Ather_userController@follow')->name('follow');
   Route::get('/ather_user{user}/unfollow', 'Ather_userController@unfollow')->name('unfollow');

   // ツイート関連
    Route::post('/tweets/create', 'TweetsController@create');

    //プロフィール編集
      Route::get('login_user/prof_edit','login_userController@prof_edit');
      Route::post('login_user/prof_edit/edit','login_userController@edit');

    //一覧
    Route::get('login_user/follow_list','login_userController@follow_list');
    Route::get('login_user/follower_list','login_userController@follower_list');
});
