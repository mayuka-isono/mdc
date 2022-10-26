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
                    <h5 class="card-title" style="font-weight:bold;color:brown"; >User Name</h5>
                    <h2 style="font-weight:bold;" >{{ $user->name }}</h2>
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
            <div class="love-good">   <!-- いいね機能 -->
                <div style="font-weight:bold;" >* LOVE * &emsp;</div>
                @if(Auth::check())
                <div class="like">
                    @if($fav)
                        <p class="favorite-marke" >
                            <button class="js-like-toggle loved" data-postid="{{ $post->id }}" ><i class="fas fa-heart" ></i></button>
                            <span class="likesCount">{{$post->likes_count}}</span>
                        </p>
                    @else
                        <p class="favorite-marke">
                            <button class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart test"></i></button>
                            <span class="likesCount">{{$post->likes_count}}</span>
                        </p>
                    @endif
                </div>
                @endif
            </div>

            <div class="follow-followed">  <!-- フォロー機能 -->
                <div style="font-weight:bold;" >* FOLLOW * &emsp;</div>
                @if(Auth::check())
                <div class="follow">
                    @if($follow)
                        <p class="follow-marke-now" >
                            <button class="js-follow-toggle followed" data-follow="{{ $user->id }}"><div class="fol"  >follow</div></button>
                        </p>
                    @else
                        <p class="follow-marke">
                            <button class="js-follow-toggle" href="" data-follow="{{ $user->id }}"><div class="fol">follow</div></button>
                        </p>
                    @endif
                </div>
                @endif
            </div>

            <div class="card" style="margin: 20px 0px; padding: 20px 15px;border-color:#006400;">
                <div class="" novalidate>
                    <div class="form-group">
                        <label for="post_title" class="form-label">POST TITLE</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;{{ $post->post_title }}<&emsp;】</div>
                    </div>
                    <div class="form-group">
                        <label for="seson" class="form-label">SEASON</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;&emsp;{{ $season }}&emsp;&emsp;】</div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">CATEGORY</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;&emsp;{{ $category }}&emsp;&emsp;】</div>
                    </div>
                    <div class="form-group">
                        <label for="size" class="form-label">SIZE</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;&emsp;{{ $size }}&emsp;&emsp;】</div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="form-label">COLOR</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;&emsp;{{ $color }}&emsp;&emsp;】</div>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="form-label">USER_COMMENT</label>
                        <div class="contents">&emsp;==>&emsp;&emsp;【&emsp;{{ $post->comment }}&emsp;】</div>
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
    .love-good {
        display:flex;
    }
    .loved i {
        color: #FF3399;
    }
    .js-like-toggle {
        border:none;
    }
    .follow-followed {
        display:flex;
    }
    .js-follow-toggle {
        border-radius:10px;
    }
    .followed {
        background-color:#006400 ;
        color:white;
    }
    .contents {
        font-weight:bold;
    }
    .form-label {
        font-size:18px;
        font-weight:bold;
        color:brown;
    }
</style>
