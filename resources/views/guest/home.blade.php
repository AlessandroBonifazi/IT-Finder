<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <form action="{{ route('user.search') }}" method="GET">
            <input type="text" name="search"/>
            <button type="submit">Search</button>
        </form>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Specialization</th>
                      </tr>
                    </thead>
                    <tbody>


                        @if($users->isNotEmpty())
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <p>{{ $user->name }}</p>
                            </td>

                            <td>
                                @foreach ($user['specializations'] as $item)
                                {{$item->specialization}}

                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <div>
                                <h2>No users found</h2>
                            </div>
                        @endif
                    </tbody>
                </div>

            </div>
        </div>
    </div>


</html>
