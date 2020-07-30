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

    a{
      color: #636b6f;
    }

    a:visited{
      color:#636b6f;
      text-decoration: none;
    }

    .title {
        font-size: 45px;
    }

    .user_info{
      margin: 10px;
      margin-bottom: 30px;
      display: flex;
    }

    .user_info  p{
      font-size: 25px;
      display: inline;
      vertical-align: top;
    }

    .user_info  img{
      display: inline-block;
      vertical-align: middle;
    }

    .follow{
      margin: 0px 15px;
    }

    .auth p{
      padding: 0 10px 0 10px;
    }

    .auth a{
      padding: 5px 10px 5px 10px;
      text-decoration: none;
      border: 1px solid #636b6f;
      font-size: 25px;
      border-radius: 15px;
      box-shadow: 4px 4px rgba(0,0,0,0.4);
    }

    .auth a:active {
  /*ボタンを押したとき*/
  -webkit-transform: translateY(4px);
  transform: translateY(4px);/*下に動く*/
  box-shadow: 2px 2px rgba(0, 0, 0, 0.4);/*影を小さく*/
  border-bottom: none;
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
    <div class="user_info">
      <img src="{{$user_data[0]->profile_image}}" alt="Noimg">
      <div class="">
        <div class="">
          <p class="">{{$user_data[0]->screen_name}}/&#64;{{$user_data[0]->name}}</p>
          <p class="follow">フォロー{{$follow_count}}人</p>
          <p class="follow">フォロワー{{$followr_count}}人</p>
        </div>
        <div class="auth">
          @auth
          @if ($follow_exists)
          <p>フォロー中</p>
          @else
          <p>未フォロー</p>
          @endif
          @if ($follow_exists)
          <a href="{{url('ather_user'.$user_data[0]->id.'/unfollow')}}">フォロー解除</a>
          @else
          <a href="{{url('ather_user'.$user_data[0]->id.'/follow')}}">フォローする</a>
          @endif
          @endauth
        </div>
      </div>
    </div>
    @foreach ($followr_tweet as $tweet)
    <div class="all">
      <img src="{{$tweet->profile_image}}" alt="">
      <div class="palagraf">
        <p class="name">{{$tweet->name}}/&#64;{{$tweet->screen_name}}</p>
        <p class="text">{{$tweet->text}}</p>
        <p class="time">{{$tweet->created_at}}</p>
      </div>
    </div>
    @endforeach
  </body>
</html>
