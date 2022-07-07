@extends('layouts.app')

@section('content')
    <div class="col-10">
        <div class="itf-card">
            <div class="itf-card-header">
                <h3 class="itf-card-title">Edit User</h3>
            </div>
            <div class="itf-card-body">

                <form action="{{ route('user.update-profile', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- Name --}}
                    <div class="row">
                        <div class="col-6">

                            <div class="itf-form-box">
                                <label for="name" class="itf-form-label">Name*</label>

                                <input class="itf-form-control" type="text" name="name" id="name"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- Surname --}}
                        <div class="col-6">
                            <div class="itf-form-box">
                                <label for="surname" class="itf-form-label">Lastname*</label>
                                <input class="itf-form-control" type="text" name="surname" id="surname"
                                    value="{{ old('surname', $user->surname) }}" required>
                                @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="itf-form-box">
                                <label for="cv" class="itf-form-label">About You</label>
                                <textarea class="itf-form-control" name="cv" id="cv" cols="20" rows="8">{{ old('email', $user->cv) }}</textarea>
                                @error('cv')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Contact-phone --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="itf-form-box">
                                <label for="phone" class="itf-form-label">Phone</label>
                                <input class="itf-form-control" type="text" name="phone" id="phone"
                                    value="{{ old('phone', $user->contactInfo->phone) }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Contact-linkedin --}}
                        <div class="col-6">
                            <div class="itf-form-box">
                                <label for="linkedin" class="itf-form-label">Linkedin</label>
                                <input class="itf-form-control" type="text" name="linkedin" id="linkedin"
                                    value="{{ old('linkedin', $user->contactInfo->linkedin) }}">
                                @error('linkedin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="itf-form-box">
                                <label for="github" class="itf-form-label">Github</label>
                                <input class="itf-form-control" type="text" name="github" id="github"
                                    value="{{ old('github', $user->contactInfo->github) }}">
                                @error('github')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="itf-form-box">
                                <label for="site" class="itf-form-label">Site</label>
                                <input class="itf-form-control" type="text" name="site" id="site"
                                    value="{{ old('site', $user->contactInfo->site) }}">
                                @error('site')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="itf-form-box">
                                <label for="location" class="itf-form-label">Location</label>
                                <input type="text" class="itf-form-control" name="location" id="location"
                                    placeholder="Location" value="{{ old('location', $user->location) }}">
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Specializations --}}
                    <div class="itf-form-box">

                        <h5 class="itf-form-label">Update your Specializations</h5>
                        <div class="itf-checkbox-list yellow-95">
                            @foreach ($specializations as $spec)
                                <div class="itf-checkbox-list-item">
                                    <input type="checkbox" name="spec[{{ $spec->id }}]" id="spec[{{ $spec->id }}]"
                                        value="{{ $spec->id }}"
                                        {{ $user->specializations->contains($spec->id) ? 'checked' : '' }}>
                                    <label for="spec[{{ $spec->id }}]" class="itf-checkbox-list-item-label">
                                        {{ $spec->specialization }}</label>
                                </div>
                            @endforeach
                            @error('specialization')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- submit --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="itf-form-box">
                                <button class="itf-btn itf-btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
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
        {{-- Tech --}}
        <div class="row">
            <div class="col-6">
                <div class="itf-card my-2">
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
                                        <input type="checkbox" id="techId[{{ $tech->name }}]"
                                            name="techId[{{ $tech->name }}]" value="{{ $tech->id }}"
                                            class="itf-checkbox-list-item"
                                            {{ $user->technologies->contains($tech->id) ? 'checked' : '' }}>
                                        <label for="techId[{{ $tech->name }}]">{{ $tech->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="itf-form-box">

                                <button class="itf-btn itf-btn-primary" type="submit">Save</button>
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
                        </div>

                        {{-- submit --}}
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="itf-card my-2">
                    <form action="{{ route('user.tech', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="itf-card-header">
                            <h5 class="itf-card-title">Cant find your stacks? Add it</h5>
                        </div>
                        <div class="itf-card-body">
                            <div class="my-3">

                                <div class="itf-form-box">
                                    <label for="techName[]" class="itf-form-label">Name*</label>
                                    <input type="text" class="itf-form-control" name="techName[]" required>
                                    @error('techName[]')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="itf-form-box">
                                    <label for="formFileSm"class="itf-form-label">Add Logo*</label>
                                    <input name="logo" class="itf-form-control" id="formFileSm" type="file"
                                        required>
                                    @error('techName[]')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- submit --}}
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="itf-btn itf-btn-primary">Save</button>
                                </div>
                            </div>
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
    </div>
@endsection
