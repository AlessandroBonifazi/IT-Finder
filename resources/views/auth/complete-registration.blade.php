@extends('layouts.app')



<div class="container">
    <div class="row justify-content-end align-items-center vh-100">
        <div class="col-md-6">
            {{-- <ul class="steps">
                    <li class="step step-success">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 1
                                        ? 'step-circle active'
                                        : displayedForm > 1
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >1</span
                            >
                            <!-- <span class="step-text">Step 1</span> -->
                        </div>
                    </li>
                    <li class="step step-active">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 2
                                        ? 'step-circle active'
                                        : displayedForm > 2
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >2</span
                            >
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 3
                                        ? 'step-circle active'
                                        : displayedForm > 3
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >3</span
                            >
                        </div>
                    </li>
                </ul> --}}
            <!-- ================= FIRST FORM ================= -->
            <form action="{{ route('user.update-profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="itf-card" id="form1" {{-- class="itf-card"
                    :class="displayedForm === 1 ? 'd-block' : 'd-none'" --}}>
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Hello there, {{ Auth::user()->user_name }}
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="name" class="itf-form-label">What is your name?</label>
                                <input type="text" class="itf-form-control" id="name" name="name"
                                    placeholder="John" />
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
                            {{-- <a
                                href=""
                                class="itf-skip-link"
                            >
                                Skip for the moment</a
                            > --}}
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
                            {{-- <a href="" class="itf-skip-link">
                                Skip for the moment</a
                            > --}}
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
                            {{-- <a href="" class="itf-skip-link">
                                Skip for the moment</a
                            > --}}
                        </div>
                    </div>
                </div>
                <!-- ================= THIRD FORM END ================= -->
            </form>
        </div>
    </div>
</div>
