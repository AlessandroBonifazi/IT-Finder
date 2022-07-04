@extends('layouts.app')

@section('content')
    <form action="{{ route('user.logout') }}" method="get">
        <button class="nav-link" type="submit">Logout</button>
    </form>
@endsection
