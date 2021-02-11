@extends('layouts.admin-dashboard')


@section('title')
Akil - Add Lessons
@endsection

@section('mm-active-lesson')
mm-active
@endsection

@section('active-lesson')
active
@endsection

@section('breadcrumb-title')
Lessons
@endsection

@section('breadcrumb')
Add Lessons
@endsection

@section('content')
{{-- Success Alert --}}

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Lessons to your course</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('lesson.store') }}" method="POST" class="form-group">
                        @csrf

                        <div class="py-3">
                            <label for="course">Select Course</label>
                            <select name="course_id" id="course" class="form-control">
                                <option value=""> -Select Course- </option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                          <label for="orderby">Custom serial number</label>
                          <input type="number" name="serial" id="orderby" class="form-control" placeholder="Enter custom serial number">
                        </div>
                        <div class="py-3">
                            <label for="lesson_title">Lesson Title</label>
                            <input type="text" name="lesson_title" placeholder="Enter Lesson title" class="form-control" id="lesson_title" value="{{ old('lesson_title') }}">
                            @error('lesson_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="lesson_video">Lesson Video</label>
                            <input type="text" name="lesson_video" class="form-control" id="lesson_video" placeholder="Lesson Video link">
                            <div class="alert alert-primary">Go to Youtube -> Go to video you want to display -> click on share button below video. Copy that links and paste in above text box</div>
                            @error('lesson_video')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <button class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
