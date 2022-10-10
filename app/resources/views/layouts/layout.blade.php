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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex">  <!-- 検索フォーム　-->
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <a class="navbar-brand" href="">MDC</a>  <!-- MDC アイコン　-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
                <div class="my-user-control">
                        @if(Auth::check())
                            <span class="my-user-item">{{ Auth::user()->name }}</span>
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
                            <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                        @endif
                </div>
            </div>  <!--  <div class="container-fluid"> -->
        </nav>
    @yield('content')
    </div>
</body>
</html>
