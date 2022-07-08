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
        <div class="row mt-5 mx-1">
            <div class="col-12 col-sm-6 offset-sm-3 col-md-2 offset-md-0 col-lg-2 mb-3">
                <div class="itf-card">
                    {{-- title --}}
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">ITFinder</h3>
                    </div>
                    {{-- Nav --}}
                    <nav class="navbar navbar-expand-lg">
                        {{-- Toggle --}}
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.profile') }}">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.messages') }}">Messagges</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.reviews') }}">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.checkin') }}">Promo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold" href="#">Statistics</a>
                                </li>
                                <li class="nav-item mt-5">
                                    <form action="{{ route('user.logout') }}" method="get">
                                        <button class="itf-btn itf-btn-primary m-2 p-2" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 offset-lg-0 ">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
