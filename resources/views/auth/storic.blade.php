@extends('layouts.app')
@section('content')
    <div class="col-10 col-md-10 col-lg-10">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h5 class="itf-card-title text-center">Your Storic box</h5>
                            </div>
                            <div class="itf-card-body">
                                {{-- img --}}

                                {{-- Tech Stack --}}

                                <div class="row">
                                    <div class="col-12">
                                        <div class="ff-heading yellow-70">
                                            <p>
                                                Your last promotion was:
                                            </p>
                                            <h4 class="text-capitalize">
                                                Type {{ $lastPromoType }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 itf-card-body yellow-70">
                                        <h4>
                                            Details:
                                        </h4>
                                        <ul>
                                            <li>
                                                Duration: {{ $lastPromoDuration }} days
                                            </li>
                                            <li>
                                                Expiration date:
                                                {{ $lastEndDate->format('j F, Y') }}

                                            </li>
                                        </ul>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 card-body d-flex justify-content-center">
                                        <a class="itf-btn itf-btn-primary mr-2"
                                            href="{{ route('user.edit', $user->id) }}">Edit Profile
                                        </a>
                                        <a class="itf-btn itf-btn-primary mr-2"
                                            href="{{ route('user.checkin', $user->id) }}">Buy A New One
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Se l'utente non ha completato il login --}}
@endsection
