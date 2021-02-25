@extends('layouts.admin-dashboard')


@section('title')
{{ config('app.name') }} - Become a Trainer Settings
@endsection

@section('mm-active-members')
mm-active
@endsection

@section('active-members')
active
@endsection

@section('breadcrumb-title')
Become a Trainer Settings
@endsection

@section('breadcrumb')
Become a Trainer Settings
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
                    <h3 class="d-inline-block">Become a Trainer Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('become.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <input type="hidden" name="id" value="{{ become()->id }}">
                            <label for="title">Description in banner</label>
                            <input id="title" type="text" class="form-control" name="banner_desc" placeholder="Article title" value="{{ become()->banner_desc }}">
                            @error('banner_desc')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="title">Benefits (1)</label>
                            <input id="title" type="text" class="form-control" name="benefits_one" placeholder="Article title" value="{{ become()->benefits_one }}">
                            @error('benefits_one')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Benefits (2)</label>
                            <input id="title" type="text" class="form-control" name="benefits_two" placeholder="Article title" value="{{ become()->benefits_two }}">
                            @error('benefits_two')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="title">Benefits (3)</label>
                            <input id="title" type="text" class="form-control" name="benefits_three" placeholder="Article title" value="{{ become()->benefits_three }}">
                            @error('benefits_three')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="article">Trainer Description</label>
                            <textarea name="trainer_desc" id="article" class="form-control" placeholder="Enter Article">{{ become()->trainer_desc }}</textarea>
                            @error('trainer_desc')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="py-3">
                            <label for="article">Our Team Helps</label>
                            <textarea name="team_helps" id="article" class="form-control" placeholder="Enter Article">{{ become()->team_helps }}</textarea>
                            @error('team_helps')
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
