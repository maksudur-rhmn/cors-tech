@extends('layouts.student-dashboard')

@section('profile-active')
    active
@endsection

@section('custom-css')
    <style>
        .main-dashboard .dashboard-input, .main-dashboard .dashboard-comment {
            background-color: black !important;
        }
    </style>
@endsection

@section('content')
  
            <div class="col-lg-9">
                <div class="main-dashboard" style="background-color: #fff !important">
                    <h3 class="heading-sub heading-sub--white mb-30">Update Profile</h3>

                    <form action="{{ route('coach.store') }}" method="POST" class="form-dashboard" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                         <label class="dashboard-label mb-10">Picture 1</label>
                                        <input
                                            type="file"
                                            class="dashboard-input mb-30"
                                            placeholder="Name of Course
                                            "
                                            name="cover_picture"
                                        />
                                        @error('cover_picture')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        @isset($data)
                                        <img src="{{ asset('uploads/trainers/cover') }}/{{ $data->cover_picture }}" alt="not found" width="300" height="300" class="py-5">
                                        @endisset
                                    </div>
                                    <div class="col-lg-5" style="margin-left: 70px !important;">
                                        <label class="dashboard-label mb-10">Picture 2</label>
                                        <input
                                            type="file"
                                            class="dashboard-input mb-30"
                                            placeholder="Name of Course
                                            "
                                            name="who_i_am_picture"
                                        />
                                        @error('who_i_am_picture')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        @isset($data)
                                        <img src="{{ asset('uploads/trainers/whoiam') }}/{{ $data->who_i_am_picture }}" alt="not found" width="300" height="300" class="py-5">
                                        @endisset
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">What are you looking for?</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="What are you looking for? In one line
                                            "
                                            value="{{ $data->qualification_one ?? '' }}"
                                            name="qualification_one"
                                        />
                                        @error('qualification_one')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">Your Instagram (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Your Instagram profile link (Optional)
                                            "
                                            value="{{ $data->instagram ?? '' }}"
                                            name="instagram"
                                        />
                                        @error('instagram')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">Your website (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Your website link (Optional)
                                            "
                                            value="{{ $data->website ?? '' }}"
                                            name="website"
                                        />
                                        @error('website')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">WHAT I AM LOOKING FOR?</label>
                                        <textarea
                                            rows="3"
                                            class="dashboard-comment mb-30"
                                            placeholder="Few lines about yourself"
                                            name="who_i_am"
                                        >{{ $data->who_i_am ?? '' }}</textarea>
                                        @error('who_i_am')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-footer">
                            <a  href="{{ route('coach.store') }}"  onclick="event.preventDefault();
                            this.closest('form').submit();"class="button button--dark">Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection