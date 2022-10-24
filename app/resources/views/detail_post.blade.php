@extends('layouts.layout')
@section('content')
<main>
    <section class="section">
    @if(Auth::check())
        @if(Auth::user()->role == 0 )
            <div class="text-center" style="margin: 30px 0px;background-color:#003366 ; color:white ;">
                <h1> POST DETAILS </h1>
            </div>
        @else
            <div class="text-center" style="margin: 30px 0px;">
                <h1> POST DETAILS </h1>
            </div>
        @endif
    @else
        <div class="text-center" style="margin: 30px 0px;">
            <h1> POST DETAILS </h1>
        </div>
    @endif
    </section>
    <div class="d-flex justify-content-around">
        <div class="col-4">
            <figure class="figure">
                <img src="{{asset('storage/'.$post->photo)}}" class="figure-img img-fluid rounded" alt="..." style="width: 300px;height: 360px;">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </figure>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">User Name</h5>
                    <h2>{{ $user->name }}</h2>
                    @if(Auth::check())
                        @if(Auth::user()->role == 0)
                            <a href="{{ route('user.show',['user'=> $post->user_id ])}}" class="btn" style="background-color:#003366;color:white ;" >Go User Page</a>
                        @elseif(Auth::user()->id != $post->user_id)
                        <a href="{{ route('user.show',['user'=> $post->user_id ])}}" class="btn" style="background-color:#006400;color:white;">Go User Page</a>
                        @else
                        <a href="{{ route('user.index')}}" class="btn" style="background-color:#336699;color:white;">Go My Page</a>
                        @endif
                    @else
                    <a href="{{ route('user.show',['user'=> $post->user_id ])}}" class="btn" style="background-color:#006400;color:white;">Go User Page</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="row justify-content-around">
                    <div class="col-5">
                        <a href="#" class="btn btn-outline-danger">LOVE</a>
                    </div>
                    @if(Auth::check())
                    <div class="like">
                        @if($fav->like_exist($user->id,$post->id))
                            <p class="favorite-marke" >
                                <button class="js-like-toggle loved" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></button>
                                <span class="likesCount">{{$post->likes_count}}</span>
                            </p>
                        @else
                            <p class="favorite-marke">
                                <button class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></button>
                                <span class="likesCount">{{$post->likes_count}}</span>
                            </p>
                        @endif
                    </div>
                    @endif
                    <div class="col-5">
                        <a href="#" class="btn btn-outline-info">FOLLOW</a>
                    </div>
                </div>
            </div>
            <div class="card" style="margin: 20px 0px; padding: 20px 15px;">
                <div class="" novalidate>
                    <div class="form-group">
                        <label for="post_title">POST TITLE</label>
                        <div>{{ $post->post_title }}</div>
                    </div>
                    <div class="form-group">
                        <label for="seson" class="form-label">SEASON</label>
                        {{ $season }}
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">CATEGORY</label>
                        {{ $category }}
                    </div>
                    <div class="form-group">
                        <label for="size" class="form-label">SIZE</label>
                        {{ $size }}
                    </div>
                    <div class="form-group">
                        <label for="color" class="form-label">COLOR</label>
                        {{ $color }}
                    </div>
                    <div class="form-group">
                        <label for="comment" class="form-label">USER_COMMENT</label>
                        <div>{{ $post->comment }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<style>
    .text-center {
        background-color:#006400 ;
        color:white;
    }
    .loved i {
        color: red !important;
    }
</style>
