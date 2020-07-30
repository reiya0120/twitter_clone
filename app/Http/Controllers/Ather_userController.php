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
class Ather_userController extends Controller
{
    public Function index(User $user)
    {
      $followid = 0;
      $login_user = \Auth::id();
      if ($user->id === $login_user) {
        return back();
      }
      if (DB::table('followers')
            ->where('following_id','=',$user->id)
            ->exists()) {
              $followid = DB::table('followers')
              ->where('following_id','=',$user->id)
              ->pluck('followed_id');
      }

          $followr_tweet = DB::table('Tweets')
                  ->where('user_id', '=', $followid)
                  ->join('Users','Tweets.user_id' ,'=','Users.id')
                  ->get();

      $user_data = DB::table('users')
                ->Where('id','=',$user->id)
                ->get();

        $follow_count = DB::table('followers')
                      ->where('following_id','=',$user->id)
                      ->count();

        $followr_count = DB::table('followers')
                          ->where('followed_id','=',$user->id)
                          ->count();
        $follow_exists = DB::table('followers')
                        ->where('following_id', '=',$login_user)
                        ->where('followed_id','=',$user->id)
                        ->exists();
      return view('ather_user', [
          'followr_tweet'  => $followr_tweet,
          'user_data' => $user_data,
          'follow_count' => $follow_count,
          'followr_count' => $followr_count,
          'follow_exists' => $follow_exists,
          'followid' => $followid
      ]);
    }

    public Function follow(User $user)
    {
      $login_user = \Auth::id();
      $follow_exists = DB::table('followers')
                      ->where('following_id', '=',$login_user)
                      ->where('followed_id','=',$user->id)
                      ->exists();
        if (!$follow_exists) {
          $follow_insert =  DB::table('followers')
                              ->insert([
                                'following_id' => $login_user,
                                'followed_id' => $user->id
                              ]);
        }

      return back();
    }

    public Function unfollow(User $user)
    {
      $login_user = \Auth::id();
      $follow_exists = DB::table('followers')
                      ->where('following_id', '=',$login_user)
                      ->where('followed_id','=',$user->id)
                      ->exists();
        if ($follow_exists) {
          $follow_delete =  DB::table('followers')
                              ->where('following_id', '=',$login_user)
                              ->where('followed_id','=',$user->id)
                              ->delete();
        }

      return back();
    }
}
