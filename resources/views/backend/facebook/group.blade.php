@extends('layouts.admin-dashboard')


@section('title')
Akil - Facebook Group
@endsection

@section('mm-active-facebook')
mm-active
@endsection

@section('active-facebook')
active
@endsection

@section('breadcrumb-title')
Courses
@endsection

@section('breadcrumb')
Add Facebook Group
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
                    <h3 class="d-inline-block">Facebook Group</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('facebook.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <label for="facebook_group">Facebook Group</label>
                            <input type="hidden" name="id" value="{{ $facebook_group->id }}">
                            <input id="facebook_group" type="text" class="form-control" name="facebook_group" value="{{ $facebook_group->facebook_group }}">
                            @error('facebook_group')
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
