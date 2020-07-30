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
      margin: 10px 10px 0px 0px;
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

    .content{
      padding: 25px;
      margin: 20px;
    }

    .prof_img{
      display: flex;
      padding: 10px 10px 10px 0px;
      margin: 0px 10px 0px 0px;
    }

    .submit{
      font-size: 20px;
      width: 200px;
      padding: 5px 10px 5px 10px;
      margin: 10px 10px 5px 10px;
      border-radius: 20px;
    }

    .file{
      padding: 60px 0px 0px 0px;
    }

    </style>
  </head>

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
<div class="content">
  <form class="" action="{{ url('/login_user/prof_edit/edit') }}" method="post">
    @csrf
    <p>名前</p>
    <input type="text" name="name" value="{{$user_data[0]->name}}">
    <p>ユーザー名</p>
    <p>&#64;{{$user_data[0]->screen_name}}</p>
    <p>パスワード(変更する場合のみ)</p>
    <input type="text" name="password" value="">
    <p>パスワード(確認)</p>
    <input type="text" name="re_password" value="">
    <div class="prof_img">
      <img src="{{$user_data[0]->profile_image}}" alt="">
      <input type="file" name="file" value="参照" class="file" accept="image/jpeg,image/x-png,image/gif">
    </div>
    <input type="submit" value="更新" class="submit">
  </form>
</div>
@endsection
