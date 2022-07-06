<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krona+One&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="row h-100 mt-5">
            <div class="col-sm-2 col-md-2">
                <div class="row bg-light py-0 my-0 rounded">
                    {{-- Nav --}}
                    <nav class="navbar py-5 navbar-expand-md">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.messages') }}">Messagges</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.checkin') }}">Promo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Statistics</a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('user.logout') }}" method="get">
                                            <button class="nav-link" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </nav>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
</body>


</html>
