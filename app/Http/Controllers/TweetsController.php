<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Tweet;
use App\Models\Follower;

class TweetsController extends Controller
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
                      ->join('Users','Tweets.user_id' ,'=','Users.id')
                      ->get();
    return view('top', [
        'all_tweets'  => $all_tweets
    ]);
  }
}
