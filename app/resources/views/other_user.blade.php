@extends('layouts.layout')
@section('content')
<main>
    <section class="section">
    @if(Auth::check())
        @if(Auth::user()->role == 0 )
            <div class="text-center" style="margin: 30px 0px;background-color:#003366 ; color:white ;">
                <h1> USER PAGE </h1>
            </div>
        @else
            <div class="text-center" style="margin: 30px 0px;">
                <h1> USER PAGE </h1>
            </div>
        @endif
    @else
        <div class="text-center" style="margin: 30px 0px;">
            <h1> USER PAGE </h1>
        </div>
    @endif
    </section>
    <div class="border border-dark" style="padding: 120px 0px; ">
        <div class="container">
            <div class="row">
                <div class="col">
                <img src="{{asset('storage/'.$user->icon_img)}}" class="rounded-circle" alt="..." style="width: 220px;height: 230px;">
                </div>
                <div class="col order-1">
                    <div div style="display:flex;">
                        <div>
                            <h2>NAME：{{ $user->name }}</h2>
                        </div>
                    </div>
                    <div class="border border-dark" style="padding: 20px 5px;">
                        {{ $user->user_comment }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
        @if(Auth::check())
            @if(Auth::user()->role == 0 )
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                @foreach($post as $pos)
                    <div class="col" style="margin:30px 0px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$pos['photo'])}}" class="card-img-top" alt="..." style="width: 285px;height: 330px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pos['post_title'] }}</h5>
                                <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn" style="background-color:#003366;color:white ;">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                @foreach($post as $pos)
                    <div class="col" style="margin:30px 0px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$pos['photo'])}}" class="card-img-top" alt="..." style="width: 285px;height: 330px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pos['post_title'] }}</h5>
                                <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn btn-green">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                @foreach($post as $pos)
                    <div class="col" style="margin:30px 0px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('storage/'.$pos['photo'])}}" class="card-img-top" alt="..." style="width: 285px;height: 330px;">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#663300">{{ $pos['post_title'] }}</h5>
                                <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn btn-green">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        </div>
    </div>
</main>
@endsection
<style>
    .section {
        background-color:#006400 ;
        color:white ;
    }
    .btn-green {
        background-color:#006400 ;
        color:white ;
    }
</style>
