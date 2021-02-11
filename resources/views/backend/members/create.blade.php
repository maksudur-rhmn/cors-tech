@extends('layouts.admin-dashboard')


@section('title')
Akil - Add Article
@endsection

@section('mm-active-members')
mm-active
@endsection

@section('active-members')
active
@endsection

@section('breadcrumb-title')
Member Area
@endsection

@section('breadcrumb')
Add Article
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
                    <h3 class="d-inline-block">Add Article</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('members.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" placeholder="Article title" value="{{ old('title') }}">
                            @error('title')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="article">Article</label>
                            <textarea name="article" id="article" class="form-control" placeholder="Enter Article">{{ old('article') }}</textarea>
                            @error('article')
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
