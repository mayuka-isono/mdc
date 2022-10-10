@extends('layouts.layout')
@section('content')
<main>
    <section class="">
        <div class="text-center">
            <h1> POST DETAILS </h1>
        </div>
    </section>
    <div class="row justify-content-around">
        <div class="col-4">
            <figure class="figure">
                <img src="..." class="figure-img img-fluid rounded" alt="...">
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
                    <div class="col-4">
                        <a href="#" class="btn btn-outline-danger">LOVE</a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="btn btn-outline-info">FOLLOW</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
            <thead>
                <tr>
                        <th  scope='col'>title</th>
                        <th  scope='col'>seson</th>
                        <th  scope='col'>category</th>
                        <th  scope='col'>color</th>
                        <th  scope='col'>size</th>
                    <tr>
                </thead>
                <tbody>
                    <!-- ここに投稿詳細を表示する -->
                    <tr>
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
