@extends('layouts.admin-dashboard')


@section('title')
{{ config('app.name') }} - About Settings
@endsection

@section('mm-active-members')
mm-active
@endsection

@section('active-members')
active
@endsection

@section('breadcrumb-title')
About Settings
@endsection

@section('breadcrumb')
About Settings
@endsection

@section('content')
{{-- Success Alert --}}

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row py-5">
        <div class="col-lg-8 m-auto">

            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">About Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <input type="hidden" name="id" value="{{ $about->id }}">
                            <label for="title">Description in banner</label>
                            <input id="title" type="text" class="form-control" name="banner_desc" placeholder="Article title" value="{{ $about->banner_desc }}">
                            @error('banner_desc')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="py-3">
                            <label for="title">Just Start (1)</label>
                            <input id="title" type="text" class="form-control" name="just_start_one" placeholder="Article title" value="{{ $about->just_start_one }}">
                            @error('just_start_one')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Just Start (2)</label>
                            <input id="title" type="text" class="form-control" name="just_start_two" placeholder="Article title" value="{{ $about->just_start_two }}">
                            @error('just_start_two')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Just Start (3)</label>
                            <input id="title" type="text" class="form-control" name="just_start_three" placeholder="Article title" value="{{ $about->just_start_three }}">
                            @error('just_start_three')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Benefits (1)</label>
                            <input id="title" type="text" class="form-control" name="benefits_one" placeholder="Article title" value="{{ $about->benefits_one }}">
                            @error('benefits_one')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Benefits (2)</label>
                            <input id="title" type="text" class="form-control" name="benefits_two" placeholder="Article title" value="{{ $about->benefits_two }}">
                            @error('benefits_two')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Benefits (3)</label>
                            <input id="title" type="text" class="form-control" name="benefits_three" placeholder="Article title" value="{{ $about->benefits_three }}">
                            @error('benefits_three')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="article">Our Goal Description</label>
                            <textarea name="our_goal_desc" id="article" class="form-control" placeholder="Enter Article">{{ $about->our_goal_desc }}</textarea>
                            @error('our_goal_desc')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="py-3">
                            <label for="article">Why Cors Tech?</label>
                            <textarea name="why_cors" id="article" class="form-control" placeholder="Enter Article">{{ $about->why_cors }}</textarea>
                            @error('why_cors')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="py-3">
                            <button class="btn btn-primary text-center" type="submit">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
