@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center" style="margin: 30px 0px;">
            <h1> MY PAGE </h1>
        </div>
    </section>
    <div class="border border-secondary" style="padding: 120px 0px; ">
        <div class="container">
            <div class="row">
                <div class="col">
                <img src="{{asset('storage/'.$user->icon_img)}}" class="rounded-circle" alt="..." style="width: 220px;height: 230px;">
                </div>
                <div class="col order-1">
                    <div div style="display:flex;">
                        <div>
                            <h2>NAME</h2>
                        </div>
                        <div>
                            <h4>○○人</h4>
                        </div>
                    </div>
                    <div class="border border-secondary" style="padding: 20px 5px;">
                        {{ Auth::user()->user_comment }}
                    </div>
                </div>
                <div class="col order-2">
                <div class="col-4">
                        <a href="{{ route('user.edit', ['user' => Auth::user()->id]) }}" class="btn btn-outline-dark">基本情報設定</a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('post.create') }}" class="btn btn-outline-primary">新規投稿</a>
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
                                <h5 class="card-title">{{ $pos['post_title'] }}</h5>
                                <div style="display:flex">
                                    <a href="{{ route('post.edit', ['post'=>$pos['id']]) }}" class="btn btn-primary" style="margin:0px 20px 0px 0px">Edit Post</a>
                                    <form  method="POST" action="{{ route('post.destroy', ['post'=>$pos['id']]) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-warning"> Hidden Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
