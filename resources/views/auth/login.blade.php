<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
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

    .title {
        font-size: 45px;
    }

    form{
      margin: 10px 0 0 10px;
      padding: 10px 40px 0 40px;
    }

    .form_label{
      font-size: 25px;
    }

    input{
      font-size: 25px;
      width: 300px;
      height : 25px;
      box-shadow: 0px 3px 3px rgba(0,0,0,0.4);
    }

    .btn{
      background-color: #FFF;
      margin: 40px 0 0 45px;
      padding: 0 60px 0 60px;
      border: 1px solid #636b6f;
      font-size: 25px;
      border-radius: 30px;
    }

    </style>
  </head>
<body>
  <header>
    <div class="title">
        Twitter_clone
    </div>
  </header>
  <div class="container">

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group row">
                <p><label for="screen_name" class="form_label">{{ __('ユーザー名') }}</label></p>

                <div>
                  <input id="screen_name" type="text" class="form-control{{ $errors->has('screen_name') ? ' is-invalid' : '' }}" name="screen_name" value="{{ old('screen_name') }}" required autofocus>

                  @if ($errors->has('screen_name'))
                  <span role="alert">
                    <strong>{{ $errors->first('screen_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div>
                <p><label for="password" class="form_label">{{ __('パスワード') }}</label></p>

                <div>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                  <span role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

                  <button type="submit" class="btn">
                    {{ __('ログイン') }}
                  </button>
            </form>
          </div>
  </div>
</body>
