<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Tweet;
use App\Models\Follower;
class Ather_userController extends Controller
{
    public Function index(User $user)
    {
      $followid = DB::table('followers')
                    ->where('following_id','=',$user)
                    ->select('followed_id')
                    ->get();
      $followr_tweet = DB::table('Tweets')
                        ->where('user_id','=',"$followid")
                        ->get();
      return view('ather_user', [
          'followr_tweet'  => $followr_tweet
      ]);
    }
}
