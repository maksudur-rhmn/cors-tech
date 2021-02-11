@extends('layouts.admin-dashboard')


@section('title')
Akil - {{ $course->title }}
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
{{ $course->title }}
@endsection

@section('content')
            <div class="row py-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $course->title }}</h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        
                                        <td>{{ $course->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $course->getCategory->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        
                                        <td>
                                               EUR {{ $course->price }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Course short description</th>
                                        
                                        <td>
                                               {{ $course->short_description }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Course long description</th>
                                        
                                        <td>
                                               {{ $course->description }}
                                        </td>
                                    </tr>

                                    </tr>
                                        <th>Status</th>
                                        <td>{{ ucfirst($course->status) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cover Image</th>
                                        <td>
                                            <img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="not found" width="200">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lessons</th>
                                        <td>
                                            <a href="{{ route('lesson.list', $course->id) }}" class="btn btn-primary">Lesson list for this course</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Course length</th>
                                        <td>{{ $course->course_length }}</td>
                                    </tr>


                                    <tr>
                                        <th>Course meta title</th>
                                        <td>{{ $course->meta_title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Course meta description</th>
                                        <td>{{ $course->meta_description }}</td>
                                    </tr>

                                    <tr>
                                        <th>Course meta keywords</th>
                                        <td>{{ $course->meta_keywords }}</td>
                                    </tr>


                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('course.index') }}" class="btn btn-success">Go back</a>
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
