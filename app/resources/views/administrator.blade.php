@extends('layouts.layout')
@section('content')
<main>
    <section class="" style="background-color:#003366;margin:0px 0px 0px 0px; padding:12px 0px;">
        <div class="text-center" style="color:white;">
            <h1> ADMINISTRATOR PAGE </h1>
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
                                <h5 class="card-title">{{ $pos['post_title'] }}</h5>
                                <div style="display:flex">
                                    <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn" style="margin:0px 30px 0px 0px;background-color:#003366;color:white ;">Go somewhere</a>
                                    <form  method="POST" action="{{ route('post.destroy', ['post'=>$pos['id']]) }}">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn" style="background-color:#770000;color:white ;"> Delete </button>
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
</main>
@endsection
<style>
    .album {
        background: linear-gradient(to top,#B0C4DE ,#8FBC8F );
        /* padding:50px 0px 350px 0px; */
    }
</style>

