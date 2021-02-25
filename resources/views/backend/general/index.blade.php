@extends('layouts.admin-dashboard')


@section('title')
{{ config('app.name') }} - General Settings
@endsection

@section('mm-active-members')
mm-active
@endsection

@section('active-members')
active
@endsection

@section('breadcrumb-title')
General Settings
@endsection

@section('breadcrumb')
General Settings
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
                    <h3 class="d-inline-block">General Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('general.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <label for="title">Email</label>
                            <input id="title" type="email" class="form-control" name="email" placeholder="Article title" value="{{ $setting->email }}">
                            @error('email')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="title">Phone</label>
                            <input id="title" type="text" class="form-control" name="phone" placeholder="Article title" value="{{ $setting->phone }}">
                            @error('phone')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="title">Address</label>
                            <input id="title" type="text" class="form-control" name="address" placeholder="Article title" value="{{ $setting->address }}">
                            @error('address')
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
