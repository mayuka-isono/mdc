@extends('layouts.layout')
@section('content')
<main>
    <div class="back">
        <section class="" style="background-color:#006400;">
            <div class="text-center" style="color:white;padding: 12px 0px;">
                <h1> TOP PAGE </h1>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($post as $pos)
                        <div class="col" style="margin:30px 0px;">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('storage/'.$pos['photo'])}}" class="card-img-top" alt="..." style="width: 285px;height: 330px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#663300">{{ $pos['post_title'] }}</h5>
                                    <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn btn-green">Go Post Detail</a>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="width: 200px;margin:0 auto;"> {!! $post->links() !!} </div>
        </div>
    </div>
</main>
@endsection
<style>
    .back {
        background: linear-gradient(to top,#B0C4DE ,#8FBC8F );
    }
    .album {
        background: linear-gradient(to top,#B0C4DE ,#8FBC8F );
    }
    .btn-green {
        background-color:#006400 ;
        color:white ;
    }
</style>


















