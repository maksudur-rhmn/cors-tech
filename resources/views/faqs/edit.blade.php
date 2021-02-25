@extends('layouts.admin-dashboard')

@section('title')
    {{ config('app.name') }} - Frequently Asked Question
@endsection

@section('top_css') 
   
@endsection

@section('faqs_menu_active')
    mm-active
@endsection

@section('page-name')
   Category > {{ $faq->question }}
@endsection

@section('breadcrumb')
     <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">{{ $faq->question }}</li>
        </ol>
    </div> 
@endsection

@section('bottom_js')
    <!-- parsleyjs -->
    <script src="{{ asset('dashboard_assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/pages/form-validation.init.js') }}"></script>
@endsection

@section('content')
{{-- Error Message --}}
@if($errors->all())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif

{{-- Success Message --}}
@if(session('success'))
<div class="aler alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Info Message --}}
@if(session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif

{{-- Warning Message --}}
@if(session('warning'))
<div class="alert alert-warning">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Faq</h4>
                <p class="card-title-desc">Edit your Faq.</p>
                <form action="{{ route('faqs.update', $faq->id) }}" class="needs-validation" novalidate method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Question</label>
                                <input name="question" type="text" class="form-control" id="validationTooltip03"
                                    value="{{ $faq->question }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid question.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Answer</label>
                                <textarea name="answer" type="text" class="form-control" id="validationTooltip03" required>{{ $faq->answer }}</textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid category name.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update faq</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection
