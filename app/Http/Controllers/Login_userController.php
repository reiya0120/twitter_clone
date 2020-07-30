<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\GenericUser;
use App\User;
use App\Models\Tweet;
use App\Models\Follower;
use Illuminate\Support\Facades\Hash;

class Login_userController extends Controller
{
    public function index(User $user)
    {
      $user = \Auth::id();
            $followid = 0;
            if (DB::table('followers')
            ->where('following_id','=',$user)
            ->exists()) {
              $followid = DB::table('followers')
              ->where('following_id','=',$user)
              ->pluck('followed_id');
            }

      $user_tweets = DB::table('Tweets')
                      ->where("user_id",$user)
                      ->orwhere('user_id',$followid)
                      ->select('Tweets.created_at as tweet_created_at','user_id','profile_image','name','screen_name','text')
                      ->join('Users','Tweets.user_id' ,'=','Users.id')
                      ->orderBy('tweet_created_at','desc')
                      ->get();

        $user_data = DB::table('users')
                      ->Where('id','=',$user)
                      ->get();

          $follow_count = DB::table('followers')
                            ->where('following_id','=',$user)
                            ->count();

          $followr_count = DB::table('followers')
                            ->where('followed_id','=',$user)
                            ->count();
          return view('login_user', [
                    'user_tweets' => $user_tweets,
                    'user_data' => $user_data,
                    'follow_count' => $follow_count,
                    'followr_count' => $followr_count
          ]);
    }

    public function follow_list(User $user)
    {
      $followid = 0;
      $user_id = \Auth::id();
      $user_data = DB::table('users')
                    ->Where('id','=',$user_id)
                    ->get();
      if (DB::table('followers')
            ->where('following_id','=',$user_id)
            ->exists())
      {
        $followid = DB::table('followers')
              ->where('following_id','=',$user_id)
               ->pluck('followed_id');
      }

      $follow_data = DB::table('users')
                  ->whereIn('id' , $followid)
                  ->get();

        $follow_exists = DB::table('followers')
                            ->where('following_id', '=',$followid)
                            ->where('followed_id','=',$user_id)
                            ->exists();

          return view('follow_list', [
                      'follow_data' => $follow_data,
                      'follow_exists' =>$follow_exists,
                      'followid' => $followid,
                      'followid' => $followid,
                      'user_data' => $user_data,
                ]);
    }

    public function follower_list(User $user)
    {
      $followerid[] = 0;
      $user_id = \Auth::id();
      $user_data = DB::table('users')
                    ->Where('id','=',$user_id)
                    ->get();
      if (DB::table('followers')
            ->where('followed_id','=',$user_id)
            ->exists())
      {
        $followerid = DB::table('followers')
              ->where('followed_id','=',$user_id)
               ->pluck('following_id');
      }

      $follower_data = DB::table('users')
                  ->whereIn('id',$followerid)
                  ->get();

        $follow_exists = DB::table('followers')
                            ->where('following_id', '=',$user_id)
                            ->where('followed_id','=',$followerid)
                            ->exists();

          return view('follower_list', [
                      'follower_data' => $follower_data,
                      'follow_exists' =>$follow_exists,
                      'followerid' => $followerid,
                      'user_data' => $user_data,
                ]);
    }

    public function prof_edit()
    {
      $user_id = \auth::id();
      $user_data = DB::table('users')
                    ->where('id',$user_id)
                    ->get();
      return view('prof_edit',['user_data'=>$user_data]);
    }

    public function edit(Request $request)
    {
      $validatedData = $request->validate([
          'name' => 'required|min:1|max:32',
          'password'=>'min:8|max:255',
          're_password'=>'same:password|min:8|max:255',
          'file'=>'max:1000'
      ]);
      $user = \Auth::id();
      $password = DB::table('users')
                    ->where('id',$user)
                    ->select('password')
                    ->get();
        $profile_image = DB::table('users')
        ->where('id',$user)
        ->get();
      if ($request->password !== NULL) {
        $password = $request->password;
      }
      if (isset($request['profile_image'])) {
      $profile_image =  $request['file'];
      }
      $update=DB::table('users')
                ->where('id',$user)
                ->update([
                    'name'=>$request['name'],
                  'password'=>Hash::make($password),
                  'profile_image'=> $profile_image[0]->profile_image,
                  'updated_at' =>now()
                ]);

            $followid = 0;
            if (DB::table('followers')
            ->where('following_id','=',$user)
            ->exists()) {
              $followid = DB::table('followers')
              ->where('following_id','=',$user)
              ->pluck('followed_id');
            }

      $user_tweets = DB::table('Tweets')
                      ->where("user_id",$user)
                      ->orwhere('user_id',$followid)
                      ->select('Tweets.created_at as tweet_created_at','user_id','profile_image','name','screen_name','text')
                      ->join('Users','Tweets.user_id' ,'=','Users.id')
                      ->orderBy('tweet_created_at','desc')
                      ->get();

        $user_data = DB::table('users')
                      ->Where('id','=',$user)
                      ->get();

          $follow_count = DB::table('followers')
                            ->where('following_id','=',$user)
                            ->count();

          $followr_count = DB::table('followers')
                            ->where('followed_id','=',$user)
                            ->count();
          return view('login_user', [
                    'user_tweets' => $user_tweets,
                    'user_data' => $user_data,
                    'follow_count' => $follow_count,
                    'followr_count' => $followr_count,
                    'profile_image' => $profile_image
          ]);
    }

}
