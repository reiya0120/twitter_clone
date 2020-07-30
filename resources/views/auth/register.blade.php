<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>会員登録</title>
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

    .form-label{
      font-size: 25px;
    }

    input{
      color: #000;
      font-size: 25px;
      width: 300px;
      height : 25px;
      box-shadow: 0px 3px 3px rgba(0,0,0,0.4);
    }

    button{
      background-color: #FFF;
      margin: 40px 0 0 20px;
      padding: 0 85px 0 85px;
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
      <div class="row justify-content-center">
        <div>

            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                  <p><label for="name" class="col-md-4 form-label text-md-right">{{ __('名前') }}</label></p>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div>
                  <p><label for="screen_name" class="form-label">{{ __('ユーザー名') }}</label></p>

                  <div class="col-md-6">
                    <input id="screen_name" type="text" class="form-control{{ $errors->has('screen_name') ? ' is-invalid' : '' }}" name="screen_name" value="{{ old('screen_name') }}" required>

                    @if ($errors->has('screen_name'))
                    <span role="alert">
                      <strong>{{ $errors->first('screen_name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div>
                  <p><label for="password" class="form-label">{{ __('パスワード') }}</label></p>

                  <div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div>
                  <p><label for="password-confirm" class="form-label">{{ __('パスワード(確認)') }}</label></p>

                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>

                    <button type="submit" class="btn btn-primary">
                      {{ __('登録') }}
                    </button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </body>
