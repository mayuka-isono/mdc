<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MDC') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body id="body">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:60px; background-color:#FFEFD5 ;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form method="GET" action="{{ ('/') }}" class="d-flex" style="width:300px;">  <!-- 検索フォーム　-->
                        <input class="form-control me-2" type="search" placeholder="キーワードを入力 例：NIKE" aria-label="Search" name="search" value="@if (isset($search)) {{ $search }} @endif">
                        <div>
                            <button class="btn btn-green" type="submit">Search</button>
                        </div>
                    </form>
                    <a class="navbar-brand" href="{{ ('/') }}" style="width: 250px;margin:0 auto;"><h1 style="font-weight:bold;color:#006400;">MDC</h1></a>  <!-- MDC アイコン　-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
                <div class="my-user-control">
                        @if(Auth::check())
                            <span class="my-user-item"><a href="{{ route('user.index') }}">{{ Auth::user()->name }}</a></span>
                            /
                            <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                            </form>
                            <script>
                                document.getElementById('logout').addEventListener('click',function(event) {
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                                });
                            </script>
                        @else
                            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                            /
                            <a class="my-navbar-item" href="{{ route('register') }}">新規会員登録</a>
                        @endif
                </div>
            </div>  <!--  <div class="container-fluid"> -->
        </nav>
    @yield('content')
    </div>
</body>
</html>
<style>
    #body {
        background: linear-gradient(to top,#B0C4DE ,#8FBC8F );
    }
    .btn-green {
        background-color:#006400 ;
        color:white ;
    }
</style>
