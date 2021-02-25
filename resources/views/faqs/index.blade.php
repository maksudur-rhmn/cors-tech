@extends('layouts.admin-dashboard')

@section('title')
{{ config('app.name') }} - Frequently Asked Question
@endsection


@section('top_css')
<!-- DataTables -->
<link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('faqs_menu_active')
mm-active
@endsection

@section('page-name')
Frequently Asked Question
@endsection

@section('breadcrumb')
<div class="page-title-right">
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
        <li class="breadcrumb-item active">Faq</li>
    </ol>
</div>
@endsection

@section('bottom_js')
<!-- Required datatable js -->

<script src="{{ asset('dashboard_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('dashboard_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<!-- Datatable init js -->
<script src="{{ asset('dashboard_assets/js/pages/datatables.init.js') }}"></script>

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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Frequently Asked Question</h4>
                <p class="card-title-desc">Add your desired Faq.
                </p>
                <form action="{{ route('faqs.store') }}" class="needs-validation" novalidate method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Question</label>
                                <input name="question" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Enter question" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid question.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label for="validationTooltip03">Answer</label>
                                <textarea name="answer" type="text" class="form-control" id="validationTooltip03"
                                    placeholder="Enter answer" required></textarea>
                                <div class="invalid-tooltip">
                                    Please provide a valid answer.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Faq</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Faq Lists</h4>
                <p class="card-title-desc">
                    List of all the Faqs can be downloaded in PDF or Excel Format
                </p>

                <div class="table table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                         @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><strong>{{ ucfirst($faq->question) }}?</strong></td>
                            <td>{{ ucfirst($faq->answer) }}</td>
                            <td>{{ $faq->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('faqs.edit', $faq->id) }}"><i
                                    class="text-warning fas fa-edit mr-1"></i></a>
                               
                                <a href="{{ route('faqs.delete', $faq->id) }}"><i class="text-danger fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> <!-- end col --> 
</div>

@endsection
