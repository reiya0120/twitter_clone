<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>タイムライン(ログイン中ユーザー)</title>
    <style media="screen">
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    header{
      width: 100%;
      padding: 10px 10px 10px 20px;
      border: solid;
      display: flex;
    }

    .login_header{
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin: 0 0 0 auto;
      font-size: 25px;
    }

    .login_header a{
      padding: 0 10px 0 20px;
    }

    .login_header p{
      padding: 0 20px 0 0;
    }

    .title {
        font-size: 45px;
    }

    .user_info{
      margin: 10px;
      display: flex;
    }

    .user_data > p{
      font-size: 25px;
      display: inline;
      vertical-align: top;
    }

    .user_data > img{
      display: inline-block;
      vertical-align: middle;
    }

    .details{
      font-size: 20px;
    }

    .a{
      width: 425px;
      height: 175px;
    }

    .all{
      border: solid;
      width: 425px;
      height: 175px;
      margin-top: 20px;
      margin-left: 40px;
      margin-bottom: 25px;
      display: flex;
    }

    .all > p{
      font-size: 20px;
    }

    .name{
      font-weight: 700;
    }

    .text{
      margin: auto 0px;
      flex-basis:auto;
    }

    .palagraf{
      display: flex;
      flex-direction: column;
    }

    a{
      color: #636b6f;
    }

    a:visited{
      color:#636b6f;
      text-decoration: none;
    }

    img{
      margin: auto 10px;
      width: 75px;
      height: 75px;
    }

    form{
      padding: 10px 5px 25px 10px;
      margin: 10px 10px 25px 10px;
    }

    .btn{
      width: 175px;
      height: 50px;
      border-radius: 15px;
      font-size: 20px;
    }

    .button{
  width: 510px;
  height: 100px;
  text-align: right;
}
    </style>
  </head>
  <body>
    <header>
      <div class="title m-b-md">
          Twitter_clone
      </div>
      @auth
      <div class="login_header">
        <p>{{$user_data[0]->screen_name}}/&#64;{{$user_data[0]->name}}</p>
        <a href="{{ url('/login_user') }}">タイムライン</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
      </div>
      @endauth
    </header>
    <div class="user_info">
      <img src="{{$user_data[0]->profile_image}}" alt="Noimg">
      <div class="user_data">
      <p class="">{{$user_data[0]->screen_name}}/&#64;{{$user_data[0]->name}}</p>
      <p class="follow">フォロー{{$follow_count}}人</p>
      <p class="follow">フォロワー{{$followr_count}}人</p>
      <div class="details">
        <a href="{{url('/login_user/prof_edit')}}">プロフィール編集</a>
        <a href="{{url('/login_user/follow_list')}}">フォロー一覧</a>
        <a href="{{url('/login_user/follower_list')}}">フォロワー一覧</a>
      </div>
      </div>
    </div>
    <form class="" action="{{ url('/tweets/create') }}" method="post">
      @csrf

      <textarea name="text" rows="5" cols="70"></textarea>
      <div class="button">
        <button type="submit" class="btn" value="Submit">投稿する</button>
      </div>
    </form>

    @foreach ($user_tweets as $user)
    <div class="a">
      <a href="{{ url('/ather_user'.$user->user_id) }}">
        <div class="all">
          <img src="{{$user->profile_image}}" alt="">
          <div class="palagraf">
            <p class="name">{{$user->name}}/&#64;{{$user->screen_name}}</p>
            <p class="text">{{$user->text}}</p>
            <p class="time">{{$user->tweet_created_at}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </body>
