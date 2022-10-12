@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center" style="margin: 30px 0px;">
            <h1> 基本情報設定 </h1>
        </div>
    </section>
    <div>
    <nav class="card mt-5" style="margin: 150px 400px;">
        <div class="card-body" >
            <form method="POST" action="{{ route('user.update',['user' => Auth::user()->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="icon_img" class="form-label">ICON IMAGE</label>
                    <input type="file" name="icon_img" class="form-control" id="icon_img">
                </div>
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="user_comment" class="form-label">USER_COMMENT</label>
                    <textarea class="form-control" id="user_comment" name="user_comment" rows="3"> {{$user->user_comment}} </textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </nav>



</main>

@endsection
