<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Tweet;
use App\Models\Follower;

class TopController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //userとtweetを結合
    $all_tweets = DB::table('Tweets')
                      ->select('Tweets.created_at as tweet_created_at','user_id','profile_image','name','screen_name','text')
                      ->join('Users','Tweets.user_id' ,'=','Users.id')
                      ->orderBy('tweet_created_at','desc')
                      ->orderBy('screen_name','desc')
                      ->get();
    $user_id = \Auth::id();
    $user_data = DB::table('users')
                   ->Where('id','=',$user_id)
                   ->get();
    return view('top', [
        'all_tweets'  => $all_tweets,
        'user_data' => $user_data
    ]);
  }
}
