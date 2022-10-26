@extends('layouts.layout')

@section('content')
<div id="back">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5" style="margin:150px 0px 150px 0px;">
          <div class="card-header" style="background-color:#D2B48C;color:#663300;font-weight:bold;">新規会員登録</div>
            <div class="card-body" style="background-color:#FAEBD7 ;" >
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                    </div>
                @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" style="background-color:#FAF0E6;"/>
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" style="background-color:#FAF0E6 "/>
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" style="background-color:#FAF0E6 ;">
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" style="background-color:#FAF0E6;" >
              </div>
              <div class="text-right">
                <button type="submit" class="btn" style="background-color:#D2B48C ;color:#663300 ;font-weight:bold;">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
    <span></span>
    <span></span>
  </div>


@endsection
<style>
    #back {
        background: linear-gradient(to top, #B0C4DE ,#8FBC8F );
    }
    .card-header {
        color:white;
    }
    .form-group {
        font-weight:bold;
        color:#663300;
    }
</style>

