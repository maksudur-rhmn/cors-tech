@extends('layouts.trainer-dashboard')

@section('lesson-create')
    active
@endsection

@section('content')
  
            <div class="col-lg-9">
                <div class="main-dashboard">
                    <h3 class="heading-sub heading-sub--white mb-30">Créer un exercice simple</h3>

                    <form action="{{ route('lesson.store') }}" method="POST" class="form-dashboard" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <label class="dashboard-label mb-10">SELECT COURSE</label>
                                        <div class="dashboard-select-wrapper mb-30">
                                        <select class="dashboard-select" name="course_id" id="category">
                                            <option value=""> -Select Course- </option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                            @endforeach
                                            @error('course_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="dashboard-label mb-10">LESSON NUMBER</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Serial number of lesson
                                            "
                                            name="serial"
                                        />
                                        @error('serial')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">LESSON TITLE</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Lesson title
                                            "
                                            name="lesson_title"
                                        />
                                        @error('lesson_title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10"> LESSON VIDEO</label>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="dotted-card mb-10">
                                                    <i class="fas fa-file-upload"></i>
                                                    <p>UPLOAD YOUR VIDEO</p>
                                                    <input type="file" name="lesson_video">
                                                    @error('lesson_video')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-footer">
                            <a href="{{ route('lesson.store') }}"  onclick="event.preventDefault();
                            this.closest('form').submit();"class="button button--white">Save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection