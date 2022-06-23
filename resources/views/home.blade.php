@extends('layouts.app')

@section('content')
    <<<<<<< HEAD <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    =======
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
                                        >>>>>>> 145f0419c818d5e231e7f64f3eaf7ad5e38b5fa2

                                        {{ __('You are logged in!') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
