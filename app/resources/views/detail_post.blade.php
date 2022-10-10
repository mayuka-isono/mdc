@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center">
            <h1> 投稿詳細 </h1>
        </div>
    </section>
    <div style="display-flex">
        <div class="">
            <figure class="figure">
                <img src="..." class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </figure>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">User Name</h5>
                    <p class="card-text"> It contains user information.</p>
                    <a href="#" class="btn btn-success">Go User Page</a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <a href="#" class="btn btn-outline-danger">LOVE</a>
                    <a href="#" class="btn btn-outline-info">FOLLOW</a>
                </div>
            </div>
            <div >
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                            <tr style="margin:50px ;">
                                    <th  scope='col'>title</th>
                                    <th  scope='col'>seson</th>
                                    <th  scope='col'>category</th>
                                    <th  scope='col'>color</th>
                                    <th  scope='col'>size</th>
                                <tr>
                            </thead>
                            <tbody>
                                <!-- ここに支出を表示する -->
                                <tr style="margin:50px ;">
                                    <td  scope='col'>orange pop</td>
                                    <td  scope='col'>Fall</td>
                                    <td  scope='col'>tops</td>
                                    <td  scope='col'>orange</td>
                                    <td  scope='col'>M</td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>











    </div>






































</main>
@endsection
