<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ !request()->routeIs('welcome') ? 'bg-success' : '' }}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom">
            <div class="container">
                <a class="navbar-brand text-success font-weight-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @if(!(request()->routeIs('home') || request()->routeIs('welcome')))
                    <form action="{{ route('home') }}" class="w-lg-50 mx-lg-auto" method="get">
                        <ul class="navbar-nav mt-md-0 mt-sm-2">
                            <div class="input-group">
                                <input type="text" class="form-control border border-success" placeholder="ค้นหาสินค้า"
                                    aria-label="Recipient's username" name="search" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit" id="button-addon2"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </ul>
                    </form>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-lg-4">
                            <a class="nav-link font-weight-bold" href="{{ route('home') }}">ตลาดผลไม้</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-success font-weight-bold" data-toggle="modal"
                                data-target="#loginModal">เข้าสู่ระบบ</a>
                        </li>

                        @else
                        <li class="nav-item mr-lg-4">
                            <a class="btn btn-success font-weight-bold"
                                href="{{ route('product.create') }}">ลงประกาศขาย</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index') }}">โปรไฟล์</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    ออกจากระบบ
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @guest
    @include('auth.login')
    @endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script')
    @include('sweetalert::alert')
</body>

</html>
