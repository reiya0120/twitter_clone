<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>トップ</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        a{
          color: #636b6f;
        }

        a:visited{
          color:#636b6f;
          text-decoration: none;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }


        .content {
            text-align: center;
        }

        .title {
            font-size: 45px;
        }

        .links{
          margin-left: 20px;
          padding: 20px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 30px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .a{
          width: 425px;
          height: 175px;
          margin-left: 40px;
          margin-bottom: 25px;
        }

        .all{
          border: solid;
          width: 425px;
          height: 175px;
          display: flex;
        }

        .all:hover{
          background-color: rgb(230, 236, 240);
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

        img{
          margin: auto 10px;
          width: 75px;
          height: 75px;
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

        .login_header a{
          color: #000;
        }

        .login_header a:visited{
          color:#000;
          text-decoration: none;
        }

        a{
          color: #636b6f;
        }

        a:visited{
          color:#636b6f;
          text-decoration: none;
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
    @if (Route::has('login'))
    <div class="links">
      @auth
      <a href="{{ url('/login_user') }}">Home</a>
      @else
      @if (Route::has('register'))
      <a href="{{ route('register') }}">会員登録</a>
      @endif
      <a href="{{ route('login') }}">ログイン</a>
      @endauth
      @endif
    </div>
    <div class="">
      <div class="container">
        <div class="row justify-content-center">
          <div class="">
            @foreach ($all_tweets as $tweet)
            <div class="a">
              <a href="{{ url('/ather_user'.$tweet->user_id) }}">
                <div class="all">
                  <img src="{{$tweet->profile_image}}" alt="">
                  <div class="palagraf">
                    <p class="name">{{$tweet->name}}/&#64;{{$tweet->screen_name}}</p>
                    <p class="text">{{$tweet->text}}</p>
                    <p class="time">{{$tweet->tweet_created_at}}</p>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </body>
</html>
