<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/img/favicon-16x16.png')}}">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
</head>

<body class="">

    <div id="app">
        <div class="my-bk">
            
                <nav class="navbar navbar-expand-md navbar-light  ">
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center text-light" href="{{ url('http://localhost:5173/')}}">
                            <div class="btn">
                                <img src="{{Vite::asset('resources/img/deliveboo_logo.png')}}" alt="" class="img-vue rounded-pill">
                            </div>
                            {{-- config('app.name', 'Laravel') --}}
                        </a>

                        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item ">
                                        <a class=" btn btn-light text-warning " href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item ps-2">
                                            <a class=" btn btn-warning text-light"
                                                href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning fs-5 " href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right bg-dark bg-opacity-50" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item text-warning "
                                                href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                                            <a class="dropdown-item text-warning" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            



            <main class="">
                @yield('content')
            </main>
        </div>


    </div>
</body>

</html>
