@extends('layouts.layout')
@section('content')

<main>
    <section class="">
        <div class="text-center" style="margin: 30px 0px;">
            <h1> NEW POST</h1>
        </div>
    </section>

    <form class="post_form" novalidate method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" style="border: solid; border-color: #000000;margin: 30px 80px;padding:50px 30px">
    @csrf
        <div class="row justify-content-around">
            <div class="left" >
                <div class="form-group" style="border: solid; border-color: #000000;height:120px;padding: 20px 10px;margin: 60px 0px">
                    <label for="photo" class="form-label">POST PHOTO</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="new_post_submit" style="margin:150px 0px 20px 110px">
                    <button type="submit" class="btn btn-dark btn-lg"  style="padding:20px 30px">新規投稿</button>
                </div>
            </div>
            <div class="right">
                <div class="" style="border: solid; border-color: #000000;padding: 30px 60px;">
                    <div class="" novalidate >
                        <div class="form-group">
                            <label for="post_title">POST TITLE</label>
                            <input type="text" class="form-control" id="post_title" name="post_title" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="season" class="form-label">SEASON</label>
                        <select class="season-form-select" aria-label="Default select example" name="season">
                            <option selected disabled>seson</option>
                            <option value="0">春</option>
                            <option value="1">夏</option>
                            <option value="2">秋</option>
                            <option value="3">冬</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">CATEGORY</label>
                        <select class="category-form-select" aria-label="Default select example" name="category" >
                            <option selected disabled>category</option>
                            <option value="0">トップス</option>
                            <option value="1">アウター</option>
                            <option value="2">ボトムス</option>
                            <option value="3">シューズ</option>
                            <option value="4">アクセサリー</option>
                            <option value="5">コーディネート</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="size" class="form-label">SIZE</label>
                        <select class="size-form-select" aria-label="Default select example" name="size">
                            <option selected disabled>size</option>
                            <option value="0">XS</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color" class="form-label">COLOR</label>
                        <select class="color-form-select" aria-label="Default select example" name="color">
                            <option selected disabled>color</option>
                            <option value="0">白</option>
                            <option value="1">黄色</option>
                            <option value="2">オレンジ</option>
                            <option value="3">赤</option>
                            <option value="4">ピンク</option>
                            <option value="5">紫</option>
                            <option value="6">青</option>
                            <option value="7">紺</option>
                            <option value="8">水色</option>
                            <option value="9">緑</option>
                            <option value="10">黄緑</option>
                            <option value="11">ベージュ</option>
                            <option value="12">茶色</option>
                            <option value="13">黒</option>
                            <option value="14">シルバー</option>
                            <option value="15">ゴールド</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="form-label">USER_COMMENT</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" style="resize:none"></textarea>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            </div>
        </div>
    </form>
</main>

@endsection
