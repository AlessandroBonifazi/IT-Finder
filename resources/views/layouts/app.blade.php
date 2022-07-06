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


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2 col-lg-1 bg-light py-0 my-0">

                            {{-- Nav --}}


                                    <ul class="nav justify-content-around">
                                        <li class="nav-item" >
                                            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="{{ route('user.messages') }}">Messagges</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="{{ route('user.checkin') }}">Promo</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="#">Statistics</a>
                                        </li>

                                            <li class="nav-item" >
                                                <form action="{{ route('user.logout') }}" method="get">
                                                    <button class="nav-link itf-btn itf-btn-secondary" type="submit">Logout</button>
                                                </form>
                                            </li>


                                    </ul>



                    </div>


                    @yield('content')

                </div>



        </div>
    </div>

</body>

</html>
