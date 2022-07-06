@extends('layouts.app')

@section('content')
    <div class="col-sm-10 col-md-10 col-lg-6 offset-lg-1 my-5">
        <form action="{{ route('user.update-profile', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            {{-- Name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Surname --}}
            <div class="form-group">
                <label for="surname">Surname</label>
                <input class="form-control" type="text" name="surname" id="surname"
                    value="{{ old('surname', $user->surname) }}">
                @error('surname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Email --}}
            {{-- <div class="form-group">
                    <label for="content">Email</label>
                    <input class="form-control" type="text" name="email" id="email"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
            {{-- Contact-Email --}}
            {{-- <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input class="form-control" type="text" name="contact_email" id="contact_email"
                        value="{{ old('contact_email', $user->contactInfo->contact_email) }}">
                    @error('contact_email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
            {{-- Contact-phone --}}
            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone"
                    value="{{ old('phone', $user->contactInfo->phone) }}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Contact-linkedin --}}
            <div class="form-group">
                <label for="linkedin">Linkedin</label>
                <input class="form-control" type="text" name="linkedin" id="linkedin"
                    value="{{ old('linkedin', $user->contactInfo->linkedin) }}">
                @error('linkedin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Contact-github --}}
            <div class="form-group">
                <label for="github">Github</label>
                <input class="form-control" type="text" name="github" id="github"
                    value="{{ old('github', $user->contactInfo->github) }}">
                @error('github')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Contact-site --}}
            <div class="form-group">
                <label for="site">Site</label>
                <input class="form-control" type="text" name="site" id="site"
                    value="{{ old('site', $user->contactInfo->site) }}">
                @error('site')
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
                <h5>Update your Specializations</h5>
                <div class="input-group">
                    @foreach ($specializations as $spec)
                        <button class="btn">
                            <input type="checkbox" name="spec[{{ $spec->id }}]" id="{{ $spec->id }}"
                                value="{{ $spec->id }}">
                            {{ $spec->specialization }}
                        </button>
                    @endforeach
                </div>
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

    {{-- Tech --}}
    <div class="col-6 offset-1 mb-5">
        <form action="{{ route('user.tech', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <h5>Add Technologies you know</h5>
            <div class="input-group">
                @foreach ($techs as $tech)
                    <button class="btn">
                        <input type="checkbox" id="" name="techId[{{ $tech->name }}]"
                            value="{{ $tech->id }}">
                        {{ $tech->name }}
                    </button>
                @endforeach
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

        <form action="{{ route('user.tech', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="my-3">
                <h5>Cant find your stacks? Add it</h5>
                <div class="input-group">
                    <label for="techName[]">Name</label>
                    <input type="text" class="form-control" name="techName[]">
                </div>

                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Add Logo</label>
                    <input name="logo" class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
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
@endsection
