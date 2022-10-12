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
                <img src="..." class="rounded-circle" alt="...">
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
                    <div class="border border-secondary" style="padding: 20px 5px; ">
                        comment
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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">tops</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">shose</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">bottom</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">outer</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">accessories</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">skirt</h5>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






















</main>

@endsection
