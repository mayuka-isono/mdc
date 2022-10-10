@extends('layouts.layout')
@section('content')

<main>
    <section class="">
        <div class="text-center">
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
                        <a href="#" class="btn btn-outline-primary">新規投稿</a>
                    </div>
                </div>
            </div>
        </div>
</div>






















</main>

@endsection
