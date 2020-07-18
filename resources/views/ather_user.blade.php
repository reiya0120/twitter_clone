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
    <p>Hello</p>
    @foreach ($followr_tweet as $tweet)
    <div class="all">
      <p src="{{$tweet->text}}" alt="">
    </div>
    @endforeach
  </body>
</html>
