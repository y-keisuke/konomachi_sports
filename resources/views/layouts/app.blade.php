<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} - @endifまちスポ</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="bg-light navbar navbar-expand-md shadow-sm text-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- 「記事」と「ユーザ」へのリンク--}}
                        @if(Auth::user()->is_admin)
                            <li class="nav-item">
                                <a href="{{ url('admin') }}" class="nav-link">
                                    管理画面
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('users') }}" class="nav-link">
                                    ユーザー一覧
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('teams') }}" class="nav-link">
                                    チーム一覧
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('search') }}" class="nav-link">
                                チームを探す
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('users/' . Auth::id()) }}" class="nav-link">
                                    マイページ
                                </a>
                            </li>
                            <li class="nav-item nav-link font-weight-bold border-0">
                                {{ Auth::user()->name }}
                            </li>
                            <li class="nav-item no-underline ml-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger ">
                                        ログアウト
                                    </button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('users/create') }}">個人登録</a>
                            </li>
                            <li class="nav-item no-underline ml-2">
                                <a class="nav-link btn btn-success text-white" href="{{ route('login') }}">ログイン</a>
                            </li>
                        @endguest
                    </ul>
                </div>
                {{--フラッシュメッセージ--}}
                @if(session('success_msg'))
                    <div class="container mt-2 flash-msg">
                        <div class="alert alert-success">
                            {{ session('success_msg') }}
                        </div>
                    </div>
                @elseif(session('alert_msg'))
                    <div class="container mt-2 flash-msg">
                        <div class="alert alert-danger">
                            {{ session('alert_msg') }}
                        </div>
                    </div>
                @endif
            </div>
        </nav>

        <main @if(!Request::is('/')) class="py-4"@endif>
            @yield('content')
        </main>
    </div>
    <footer id="footer" class="bg-light flex-column justify-content-center">
        <p>© 2019 この町スポーツ All Rights Reserved.</p>
    </footer>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
