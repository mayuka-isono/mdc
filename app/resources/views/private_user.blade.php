@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center" style="padding: 15px 0px;background-color:#006400;">
            <h1 style="color:white;"> MY PAGE </h1>
        </div>
    </section>
    <div class="user-info">
        <div class="border border-secondary" style="padding: 120px 0px;">
            <div class="container">
                <div class="row" >
                    <div class="col">
                    <img src="{{asset('storage/'.$user->icon_img)}}" class="rounded-circle" alt="..." style="width: 220px;height: 230px;" >
                    </div>
                    <div class="col order-1">
                        <div class="d-flex justify-content-start">
                            <div>
                                <h3 style="font-weight:bold;">NAME &ensp;:&ensp;</h3>
                            </div>
                            <div class="col-4" >
                                <h3 style="font-weight:bold;color:brown">{{ Auth::user()->name }}</h3>
                            </div>
                        </div>
                        <div class="border border-secondary" style="padding: 20px 5px; background-color:#FFFFEE;font-weight:bold;">
                            {{ Auth::user()->user_comment }}
                        </div>
                    </div>
                    <div class="col order-2">
                    <div class="col-4">
                            <a href="{{ route('user.edit', ['user' => Auth::user()->id]) }}" class="btn btn-outline-dark">基本情報設定</a>
                        </div>
                        @if(Auth::user()->role == 1)
                            <div class="col-4">
                                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">新規投稿</a>
                            </div>
                        @else
                        @endif
                        <a href="{{ route('fav.index') }}" class="btn btn-outline-danger">いいね一覧</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                @foreach($post as $pos)
                    <div class="col" style="margin:30px 0px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$pos['photo'])}}" class="card-img-top" alt="..." style="width: 285px;height: 330px;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#663300">{{ $pos['post_title'] }}</h5>
                                <div style="display:flex">
                                    <a href="{{ route('post.edit', ['post'=>$pos['id']]) }}" class="btn" style="margin:0px 20px 0px 0px;background-color:#006600 ;color:white ;">Edit Post</a>
                                    <form  method="POST" action="{{ route('post.destroy', ['post'=>$pos['id']]) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn" style="background-color:#FFCC33 ;" > Hidden Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div style="width: 200px;margin:0 auto;"> {!! $post->links() !!} </div>
    </div>
</main>

@endsection
<style>
    .user-info {
        background: linear-gradient(to bottom,#CBFFD3,#FFFACD);
    }
    .album {
        background: linear-gradient(to top,#B0C4DE ,#8FBC8F );
    }
    .btn-green {
        background-color:#006400 ;
        color:white ;
    }
</style>

