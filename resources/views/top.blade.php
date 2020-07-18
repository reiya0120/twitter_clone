<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Twitter_clone</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

        .all{
          border: solid;
          width: 425px;
          height: 175px;
          margin-left: 40px;
          margin-bottom: 25px;
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
        }

    </style>
  </head>
  <body>
    <header>
      <div class="title m-b-md">
          Twitter_clone
      </div>
    </header>
    @if (Route::has('login'))
    <div class="links">
      @auth
      <a href="{{ url('/home') }}">Home</a>
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
            <div class="all">
              <img src="{{$tweet->profile_image}}" alt="">
              <div class="palagraf">
                <p class="name">{{$tweet->name}}/@ {{$tweet->screen_name}}</p>
                <p class="text">{{$tweet->text}}</p>
                <p class="time">{{$tweet->created_at}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </body>
</html>
