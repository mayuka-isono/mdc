@extends('layouts.layout')
@section('content')

<main>
    <section class="">
        <div class="text-center" style="margin: 30px 0px;">
            <h1> NEW POST</h1>
        </div>
    </section>
    <div class="row justify-content-around">
        <div class="left">
            <figure class="figure">
                <img src="..." class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </figure>
        </div>
        <div class="border border-secondary" >
            <form class="" novalidate  style="margin: 30px 60px;">
                <div class="form-group">
                        <label for="post_title">POST TITLE</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" />
                    </div>
                <div class="form-group">
                    <label for="seson" class="form-label">SESON</label>
                    <select class="seson-form-select" aria-label="Default select example">
                        <option selected>seson</option>
                        <option value="0">春</option>
                        <option value="1">夏</option>
                        <option value="2">秋</option>
                        <option value="3">冬</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">CATEGORY</label>
                    <select class="category-form-select" aria-label="Default select example">
                        <option selected>category</option>
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
                    <select class="size-form-select" aria-label="Default select example">
                        <option selected>size</option>
                        <option value="0">XS</option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="4">XL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="color" class="form-label">COLOR</label>
                    <select class="color-form-select" aria-label="Default select example">
                        <option selected>color</option>
                        <option value="0">白</option>
                        <option value="1">黄色</option>
                        <option value="2">オレンジ</option>
                        <option value="3">赤</option>
                        <option value="4">ピンクL</option>
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
                    <div class="form-group">
                        <label for="comment" class="form-label">USER_COMMENT</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
