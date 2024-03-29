<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon-16x16.png') }}">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top my-back-main-navbar flex-md-nowrap p-2 shadow">
            <div class="row justify-content-between">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
                    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="" class="my-logo-dashboard">
                    <p class="text-light fs-5 d-inline-block">DeliveBoo</p>
                </a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2">
                    <a class="btn btn-light text-info" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse"
                    style="background-color: #27187E">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'my-back-link-left' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'my-back-link-left' : '' }}"
                                    href="{{ route('admin.restaurants.index') }}">
                                    <i class="fa-solid fa-building fa-lg fa-fw "></i> My Restaurant
                                </a>
                            </li>
                            @if(Auth::check() && Auth::user()->restaurant)
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.meals.index' ? 'my-back-link-left' : '' }}"
                                        href="{{ route('admin.meals.index') }}">
                                        <i class="fa-solid fa-drumstick-bite fa-lg fa-fw"></i> My Menú
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.meals.trash' ? 'my-back-link-left' : '' }}"
                                        href="{{ route('admin.meals.trash') }}">
                                        <i class="fa-solid fa-trash-can fa-lg fa-fw"></i> Deleted meals
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'my-back-link-left' : '' }}"
                                        href="{{ route('admin.orders.index') }}">
                                        <i class="fa-solid fa-folder fa-lg fa-fw"></i> My Orders
                                    </a>
                                </li>
                            @endif
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
