

@extends('layouts.layout')

@section('content')
<div id="back">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header"> LOGIN </div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-green">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<style>
    #back {
        background: linear-gradient(to bottom, white , #2E8B57);
    }
    .btn-green {
        background-color:#006400 ;
        color:white ;
    }
</style>
