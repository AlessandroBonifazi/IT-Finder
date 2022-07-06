@extends('layouts.app')

@section('content')
    <div class="container-input d-flex flex-column px-3 ">
        <div class="flex-form px-3 justify-center offset-0">
            <div class="style-form p-3  border_radius itf-card">
                <form action="{{ route('user.update-profile', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- Name --}}
                    <div class="form-row ">
                        <div class="form-group col-md-6 col-sm-6 yellow-95">
                            <label for="name">Name</label>

                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Surname --}}
                        <div class="form-group col-md-6 col-sm-6 yellow-95">
                            <label for="surname">Surname</label>
                            <input class="form-control" type="text" name="surname" id="surname"
                                value="{{ old('surname', $user->surname) }}">
                            @error('surname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Contact-phone --}}
                    <div class="form-group yellow-95">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" id="phone"
                            value="{{ old('phone', $user->contactInfo->phone) }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Contact-linkedin --}}
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-4 yellow-95">
                            <label for="linkedin">Linkedin</label>
                            <input class="form-control" type="text" name="linkedin" id="linkedin"
                                value="{{ old('linkedin', $user->contactInfo->linkedin) }}">
                            @error('linkedin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Contact-github --}}
                        <div class="form-group  col-sm-4 col-md-4 yellow-95">
                            <label for="github">Github</label>
                            <input class="form-control" type="text" name="github" id="github"
                                value="{{ old('github', $user->contactInfo->github) }}">
                            @error('github')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Contact-site --}}
                        <div class="form-group  col-sm-4 col-md-4 yellow-95">
                            <label for="site">Site</label>
                            <input class="form-control" type="text" name="site" id="site"
                                value="{{ old('site', $user->contactInfo->site) }}">
                            @error('site')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- Location --}}
                    <div class="form-group yellow-95">
                        <label for="title">Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location"
                            value="{{ old('location', $user->location) }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Specializations --}}
                    <h5>Update your Specializations</h5>
                    <div class="itf-checkbox-list yellow-95">


                        @foreach ($specializations as $spec)
                            <div class="itf-checkbox-list-item">

                                <input type="checkbox" name="spec[{{ $spec->id }}]" id="{{ $spec->id }}"
                                    value="{{ $spec->id }}">
                                <label for="spec[{{ $spec->id }}]" class="itf-checkbox-list-item-label">
                                    {{ $spec->specialization }}</label>

                            </div>
                        @endforeach

                        @error('specialization')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
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
        <div class="flex-form p-3">
            {{-- Tech --}}
            <div class="itf-card">
                <form action="{{ route('user.tech', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="itf-card-header">
                        <h5 class="itf-card-title">Add Technologies you know</h5>

                    </div>

                    <div class="itf-card-body">
                        <div class="itf-checkbox-list">
                            @foreach ($techs as $tech)
                                <div class="itf-checkbox-list-item">
                                    <input type="checkbox" id="" name="techId[{{ $tech->name }}]"
                                        value="{{ $tech->id }}" class="itf-checkbox-list-item">
                                    {{ $tech->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- submit --}}
                    <input class="itf-btn itf-btn-secondary" type="submit">
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
                <div class="itf-card">
                    <form action="{{ route('user.tech', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="itf-card-header">
                            <h5 class="itf-card-title">Cant find your stacks? Add it</h5>
                        </div>
                        <div class="itf-card-body">
                            <div class="my-3">

                                <div class="itf-form-box">
                                    <label for="techName[]" class="itf-form-label">Name</label>
                                    <input type="text" class="itf-form-control" name="techName[]">
                                </div>

                                <div class="itf-form-box">
                                    <label for="formFileSm"class="itf-form-label">Add Logo</label>
                                    <input name="logo" class="itf-form-control" id="formFileSm" type="file">
                                </div>
                            </div>
                            {{-- submit --}}
                            <input class="itf-btn itf-btn-secondary itf-btn-full-width" type="submit">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>

                    </form>

                </div>

            </div>


        </div>

    </div>

@endsection
