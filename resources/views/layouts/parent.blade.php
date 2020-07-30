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


    img{
      width: 75px;
      height: 75px;
    }

    </style>
  </head>
<body>
  <header>
    @yield('header')
  </header>
  <div class="main">
    @yield('contents')
  </div>
</body>
