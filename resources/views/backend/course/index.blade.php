@extends('layouts.admin-dashboard')


@section('title')
CORS TECH - Course Lists
@endsection

@section('css')
        <!-- DataTables -->
        
        <link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('mm-active-course')
mm-active
@endsection

@section('active-course')
active 
@endsection

@section('breadcrumb-title')
Courses
@endsection

@section('breadcrumb')
Courses
@endsection

@section('content')
{{-- Alert Message --}}

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
            <div class="row py-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">+ Add new</a>
                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Lessons</th>
                                        <th>Trainer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->getCategory->category_name }}</td>
                                        <td>
                                            @if ($course->status != 'free')
                                               EUR {{ $course->price }}
                                            @else 
                                              Free
                                            @endif
                                        </td>
                                            <td>
                                                <a href="{{ route('lesson.list', $course->id) }}" class="btn btn-primary">Lesson list</a>
                                            </td>
                                        <td>{{ ucfirst($course->getUser->name) }}</td>
                                        <td>{{ ucfirst($course->status) }}</td>
                                        <td>
                                         <a href="{{ route('course.show', $course->id) }}" class="mr-2"><i class="fas fa-eye text-primary"></i></a>
                                         <a href="{{ route('course.edit', $course->id) }}" class="mr-2"><i class="fas fa-edit text-warning"></i></a>
                                         <a href="{{ route('course.delete', $course->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
@endsection

@section('footer-script')
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
     <script src="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

     <!-- Datatable init js -->
     <script src="{{ asset('dashboard_assets/js/pages/datatables.init.js') }}"></script>
@endsection
