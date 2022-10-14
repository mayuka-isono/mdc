@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center" style="margin: 30px 0px;">
            <h1> POST DETAILS </h1>
        </div>
    </section>
    <div class="d-flex justify-content-around"">
        <div class="col-4">
            <figure class="figure">
                <img src="{{asset('storage/'.$post->photo)}}" class="figure-img img-fluid rounded" alt="..." style="width: 300px;height: 360px;">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </figure>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">User Name</h5>
                    <p class="card-text"> It contains user information.</p>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-success">Go User Page</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="row justify-content-around">
                    <div class="col-5">
                        <a href="#" class="btn btn-outline-danger">LOVE</a>
                    </div>
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





    <!-- <div class="row justify-content-evenly">
    <div class="col-4">
      One of two columns
    </div>
    <div class="col-4">
      One of two columns
    </div>
  </div> -->






    </div>






































</main>
@endsection
