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
        <div class="row h-100 mt-4 mx-1">
            <div class="col mb-4">
                <div class="itf-card ">
                    {{-- title --}}
                    <div class="itf-card-header">
                        <a href="/">
                            <h3 class="itf-card-title d-none d-xl-inline">ITFinder</h3>
                            <h3 class="itf-card-title itf-card-title-small d-xl-none">ITF</h3>
                        </a>
                    </div>
                    {{-- Nav --}}
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
                        </button>
                        <div class="collapse navbar-collapse">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
                                            <path
                                                d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9v5h-5v-5h5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Dashboard</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.profile') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.messages') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Messagges</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.reviews') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path
                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Reviews</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.checkin') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                            <path
                                                d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Promo</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ff-body text-dark font-weight-bold"
                                        href="{{ route('user.statistics') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                        </svg> <span class="d-md-none d-xl-inline ">Statistics</span></a>
                                </li>

                                <li class="nav-item mt-5">
                                    <form action="{{ route('user.logout') }}" method="get">
                                        <button class="itf-btn itf-btn-primary-outline itf-btn-small d-none d-xl-block"
                                            type="submit">Logout</button>
                                        <button class="itf-btn itf-btn-primary-outline itf-btn-icon d-xl-none"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-door-open"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                                                <path
                                                    d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                                            </svg></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
