@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center">
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
                                <h5 class="card-title">{{ $pos['post_title'] }}</h5>
                                <a href="{{ route('post.show', ['post'=>$pos['id']]) }}" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {!! $post->links() !!}
    </div>

</main>

@endsection



















