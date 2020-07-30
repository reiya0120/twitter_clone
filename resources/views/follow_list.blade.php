<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

    .details{
      font-size: 20px;
    }


    img{
      margin: auto 10px;
      width: 75px;
      height: 75px;
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

    .name{
      position:  relative;
      font-weight: 700;
      top :30%;
    }

    .palagraf  p{
      margin: 0px;
      text-align: center;
    }

    .exist{
      position:  relative;
      top : 45%;
    }

    a{
      color: #000;
    }

    a:visited{
      color:#000;
      text-decoration: none;
    }

    </style>
  </head>
<body>
  @extends('layouts/header')
  @section('header')
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
  @endsection
  @section('contents')
  @foreach($follow_data as $follow)
  <a href="{{ url('/ather_user'.$follow->id) }}">
  <div class="all">
      <img src="{{$follow->profile_image}}" alt="">
      <div class="palagraf">
        <p class="name">{{$follow->name}}/&#64;{{$follow->screen_name}}</p>
        @if ($follow_exists)
        <p class="exist">フォローされている</p>
        @else
        <p class="exist">フォローされていない</p>
        @endif
      </div>
  </div>
</a>
  @endforeach
  @endsection
</body>
</html>
