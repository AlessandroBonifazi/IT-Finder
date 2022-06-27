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
        {{-- <form  method="GET" action="" >

            <input type="search" class="form-control" name="search">Search Name

            <input type="submit" value="search"> --}}

            {{-- @if ()

            @endif --}}


        {{-- </form> --}}
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search"/>
            <button type="submit">Search</button>
        </form>

        @if($users->isNotEmpty())
    @foreach ($users as $user)
        <div class="post-list">
            <p>{{ $user->name }}</p>
            {{-- <p>{{ $user->position }}</p> --}}
        </div>
    @endforeach
@else
    <div>
        <h2>No users found</h2>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">email</th>
        <th scope="col">github</th>
        <th scope="col">linkedin</th>
        <th scope="col">phone</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>

    </tr>
  </thead>
  <tbody>
      {{-- @foreach ($users as $user)
       {{$user->name}}
       @endforeach --}}

</body>

</html>
