@extends('layouts.trainer-dashboard')

@section('profile-active')
    active
@endsection


@section('content')
  
            <div class="col-lg-9">
                <div class="main-dashboard">
                    <h3 class="heading-sub heading-sub--white mb-30">Update Profile</h3>

                    <form action="{{ route('coach.store') }}" method="POST" class="form-dashboard" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                         <label class="dashboard-label mb-10">Cover Image (For Profile Page)</label>
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
                                    <div class="col-lg-5">
                                        <label class="dashboard-label mb-10">Who I am Image</label>
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
                                        <label class="dashboard-label mb-10">Your Qualifications</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Qualification One
                                            "
                                            value="{{ $data->qualification_one ?? '' }}"
                                            name="qualification_one"
                                        />
                                        @error('qualification_one')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">Your Qualifications (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Qualification Two
                                            "
                                            value="{{ $data->qualification_two ?? '' }}"
                                            name="qualification_two"
                                        />
                                        @error('qualification_two')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">Your Qualifications (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Qualification three
                                            "
                                            value="{{ $data->qualification_three ?? '' }}"
                                            name="qualification_three"
                                        />
                                        @error('qualification_three')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">Your Qualifications (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Qualification four
                                            "
                                            value="{{ $data->qualification_four ?? '' }}"
                                            name="qualification_four"
                                        />
                                        @error('qualification_four')
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
                                        <label class="dashboard-label mb-10">WHO I AM</label>
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
                            this.closest('form').submit();"class="button button--white">Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection