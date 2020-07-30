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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
}
