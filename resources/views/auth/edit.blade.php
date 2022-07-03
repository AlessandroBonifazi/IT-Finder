@extends('layouts.app')

@section('content')
    <div class="row h-100 mt-5">
        <div class="col-sm-2 col-md-2">
            <div class="row d-flex flex-column h-100 bg-light py-0 my-0 rounded">
                {{-- Nav --}}
                <nav id="sidebarMenu" class="col-2 ">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.messages') }}">Messagges</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Statistics</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
            {{-- @dd($user); --}}
            <form action="{{ route('user.update-profile', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                {{-- Name --}}
                <div class="form-group">
                    <label for="content">Name</label>
                    <input class="form-control" type="text" name="name" id="name"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Surname --}}
                <div class="form-group">
                    <label for="content">Surname</label>
                    <input class="form-control" type="text" name="surname" id="surname"
                        value="{{ old('surname', $user->surname) }}">
                    @error('surname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Email --}}
                <div class="form-group">
                    <label for="content">Email</label>
                    <input class="form-control" type="text" name="email" id="email"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- PSW --}}
                <div class="form-group">
                    <label for="content">Password</label>
                    <input class="form-control" type="password" name="password" id="password"
                        value="{{ old('password', $user->password) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Location --}}
                <div class="form-group">
                    <label for="title">Location</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location"
                        value="{{ old('location', $user->location) }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Specializations --}}
                <div class="form-group">
                    <label for="title">Specializations</label>
                    <select name="specialization_id">
                        <option value="">Add Specializations</option>
                        @foreach ($specializations as $specialization)
                            {
                            <option value="{{ $specialization->id }}"
                                {{ $specialization->id == old('specialization_id', $user->specialization_id) ? 'selected' : '' }}>
                                {{ $specialization->specialization }}</option>
                            }
                        @endforeach
                    </select>
                    @error('specialization_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Contacts --}}
                {{-- <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}


                {{-- submit --}}
                <input class="btn btn-primary" type="submit">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
