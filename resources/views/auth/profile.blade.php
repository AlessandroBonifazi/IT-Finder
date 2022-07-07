@extends('layouts.app')

@section('content')
    <div class="row">
        @if ($user->contactInfo)
            <div class="col-12 col-sm-10 offset-sm-2 col-md-10 col-lg-8 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h5 class="itf-card-title">Details Profile</h5>
                            </div>
                            <div class="itf-card-body">
                                {{-- img --}}
                                <div class="row p-3">
                                    <div class="w-100 col-3">
                                        <img src="{{ asset('./storage/' . $user->img_path) }}" alt="profile-img"
                                            class="card-img-top rounded-circle" style="width: 190px" />
                                    </div>
                                    <div class="px-2 col-9">
                                        <h5 class="user-name">{{ $user->name }}
                                            {{ $user->surname }}</h5>
                                        @foreach ($specializations as $specialization)
                                            <p class="yellow-70 ff-body">{{ $specialization->specialization }}</p>
                                        @endforeach

                                        <!--Reviews da implementare-->
                                        <!--/Reviews-->

                                        @if ($user->cv)
                                            <p class="ff-body">{{ $user->cv }}</p>
                                        @endif
                                    </div>
                                </div>
                                {{-- Tech Stack --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="ff-body">
                                            <div class="ff-heading yellow-70">
                                                <h4>
                                                    Tech Stack
                                                </h4>
                                            </div>
                                            {{-- Tech stack user da implementare --}}
                                            @foreach ($techs as $tech)
                                                {{ $tech->name }}
                                                <img src="{{ asset('storage/' . $tech->logo) }}" alt=""
                                                    class="h-100" />
                                            @endforeach
                                            {{-- /Tech stack user --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="ff-heading yellow-70">
                                            <h4>
                                                Contacts
                                            </h4>
                                        </div>
                                        <ul class="">
                                            {{-- Email --}}
                                            <li class=" border-0 px-0 yellow-70">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-envelope-fill yellow-70"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                                </svg>
                                                {{ $user->email }}
                                            </li>
                                            {{-- /Email --}}
                                            {{-- Linkedin --}}
                                            <li class=" border-0 px-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-linkedin yellow-70"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                                </svg>
                                                <a href="{{ $user->contactInfo->linkedin }}"
                                                    class="text-decoration-none yellow-70 ">
                                                    Linkedin
                                                </a>
                                            </li>
                                            {{-- /Linkedin --}}
                                            {{-- Github --}}
                                            <li class=" border-0 px-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-github yellow-70" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                                </svg>
                                                <a href="{{ $user->contactInfo->github }}"
                                                    class="text-decoration-none yellow-70">
                                                    Github
                                                </a>
                                            </li>
                                            {{-- /Github --}}
                                            {{-- Site --}}
                                            <li class="border-0 px-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-globe yellow-70" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                                                </svg>
                                                <a href="{{ $user->contactInfo->site }}"
                                                    class="text-decoration-none yellow-70">
                                                    Personal Site
                                            </li>
                                            {{-- /Site --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 card-body d-flex">
                                        {{-- <button class=" itf-btn itf-btn-primary"> --}}
                                        <a class="itf-btn itf-btn-primary mr-2"
                                            href="{{ route('user.edit', $user->id) }}">Edit Profile</a>
                                        {{-- </button> --}}
                                        {{-- Delete --}}
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit'
                                                onclick="return confirm('Are you sure you want to delete your account?')"
                                                type="submit" value="" class="itf-btn itf-btn-secondary">
                                                Delete Account
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Se l'utente non ha completato il login --}}
        @else
            <form action="{{ route('user.update-profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="itf-card" id="form1" {{-- class="itf-card"
                :class="displayedForm === 1 ? 'd-block' : 'd-none'" --}}>
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Hello there, {{ Auth::user()->user_name }},
                            Complete your account
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="name" class="itf-form-label">What is your name?</label>
                                <input type="text" class="itf-form-control" id="name" name="name"
                                    placeholder="Jhon" />
                            </div>
                            <div class="itf-form-box">
                                <label for="surname" class="itf-form-label">And your last name?</label>
                                <input type="text" class="itf-form-control" id="surname" name="surname"
                                    placeholder="Doe" />
                            </div>
                            <div class="itf-form-box">
                                <label for="img_path" class="itf-form-label">Load your profile Image</label>
                                <input type="file" class="itf-form-control" id="img_path" name="img_path" />
                            </div>
                            <div class="itf-form-box">
                                <label for="location" class="itf-form-label">Where do you live?</label>
                                <input type="text" class="itf-form-control" id="location" name="location"
                                    placeholder="Milan, Italy" />
                            </div>
                            <div class="d-flex">

                                <button class="itf-btn itf-btn-primary" type="button" id="next1">
                                    NEXT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================= FIRST FORM END ================= -->
                <!-- ================= SECOND FORM ================= -->
                <div class="itf-card d-none" id="form2">
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Tell us more about yourself
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="position" class="itf-form-label">What is your Specialization?</label>
                                <div class="itf-checkbox-list">
                                    @foreach ($specializations as $specialization)
                                        <div class="itf-checkbox-list-item">
                                            <input type="checkbox" class="itf-checkbox" name="specializations[]"
                                                value="{{ $specialization->id }}"
                                                id="{{ $specialization->specialization }}" />
                                            <label class="itf-checkbox-list-item-label"
                                                for="{{ $specialization->specialization }}">
                                                {{ $specialization->specialization }} </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="itf-form-box">
                                <label for="job_experience" class="itf-form-label">Years of experience?</label>
                                <input type="number" class="itf-form-control" id="job_experience" name="job_experience"
                                    placeholder="3" min="0" max="100" />
                            </div>
                            <div class="d-flex">
                                <button id="prev2" type="button" class="itf-btn itf-btn-primary-outline mr-1">
                                    PREVIOUS
                                </button>
                                <button id="next2" class="itf-btn itf-btn-primary" type="button">
                                    NEXT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================= SECOND FORM END ================= -->
                <!-- ================= THIRD FORM ================= -->
                <div class="itf-card d-none" id="form3">
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">Ok, how to contact you?</h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="phone" class="itf-form-label">Phone number</label>
                                <input type="text" class="itf-form-control" id="phone" name="phone"
                                    placeholder="+10 0000 000" />
                            </div>
                            <div class="itf-form-box">
                                <label for="linkedin" class="itf-form-label">Linkedin</label>
                                <input type="text" class="itf-form-control" id="linkedin" name="linkedin"
                                    placeholder="linkedin/itexpert" />
                            </div>
                            <div class="itf-form-box">
                                <label for="github" class="itf-form-label">Github</label>
                                <input type="text" class="itf-form-control" id="github" name="github"
                                    placeholder="github/itexpert" />
                            </div>
                            <div class="itf-form-box">
                                <label for="site" class="itf-form-label">Site</label>
                                <input type="text" class="itf-form-control" id="site" name="site"
                                    placeholder="www.ITExpert.com" />
                            </div>
                            <div class="d-flex">
                                <button class="itf-btn itf-btn-primary-outline mr-1" type="button" id="prev3">
                                    PREVIOUS
                                </button>
                                <button class="itf-btn itf-btn-primary" id="submit" type="submit">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================= THIRD FORM END ================= -->
            </form>
        @endif
    </div>
@endsection
