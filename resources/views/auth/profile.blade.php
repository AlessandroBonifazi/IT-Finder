@extends('layouts.app')

@section('content')
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
            </div>
            {{-- img --}}
            <div class="d-flex justify-content-center">
                <img src="/img/img-placeholder.png" class="card-img-top rounded-circle" style="width: 190px" alt="profile-img">
            </div>
            {{-- details --}}
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }} {{ $user->surname }}</h5>
                <p class="card-text">Location: {{ $user->location }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <h6 class="mx-3">Specializations:</h6>
                @foreach ($specializations as $specialization)
                    <li class="list-group-item">{{ $specialization->specialization }}</li>
                @endforeach
                <li class="list-group-item">Email: {{ $user->email }}</li>
                <li class="list-group-item">Business Email: {{ $user->contactInfo->contact_email }}</li>
                <li class="list-group-item">Phone: {{ $user->contactInfo->phone }}</li>
                <li class="list-group-item">Github: <a href="">{{ $user->contactInfo->github }}</a>
                </li>
                <li class="list-group-item">Linkedin: <a href="">{{ $user->contactInfo->linkedin }}</a></li>
                <li class="list-group-item">Site: <a href="">{{ $user->contactInfo->site }}</a></li>
                {{-- <li class="list-group-item">CV: {{ $user->cv }}</li> --}}
                <li class="list-group-item">Promo</li>
                <li class="list-group-item">
                    <button class="btn btn-primary">
                        <a class="text-white" href="{{ route('user.edit', $user->id) }}">Edit Details</a>
                    </button>
                </li>
                <li class="list-group-item">
                    {{-- Delete --}}
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type='submit' onclick="return confirm('Are you sure you want to delete your account?')"
                            type="submit" value="" class="btn btn-danger">
                            Delete Account
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
@endsection
