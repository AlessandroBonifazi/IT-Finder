@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 d-inline-flex p-2 bd-highlight">
                                <div class="card">
                                    <div class="card-header">{{ __('Dashboard') }}</div>
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif


                                        {{ __('You are logged in!') }}
                                        <a href="{{ route("user.index") }}">to users</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
