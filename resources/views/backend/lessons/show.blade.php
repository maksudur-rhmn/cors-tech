@extends('layouts.admin-dashboard')


@section('title')
Akil - Lessons
@endsection

@section('css')
        <!-- DataTables -->

        <link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
Lessons
@endsection

@section('content')
{{-- Alert --}}

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
                                <a href="{{ route('lesson.store') }}" class="btn btn-success btn-sm">+ Add new</a>
                            </div>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Lesson title</th>
                                        <th>Lesson video link</th>
                                        <th>Serialize</th>
                                        <th>Edit</th>
                                        <th>Destroy</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->serial }}</td>
                                        <td>{{ $lesson->lesson_title }}</td>
                                        <td>{{ $lesson->lesson_video }}</td>
                                        <td>
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $lesson->id }}">
                                            Serialize your course
                                          </button>
                                        </td>
                                        <td>
                                         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterEdit{{ $lesson->id }}" >Edit</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('lesson.destroy', $lesson->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <label for="serial">Re order your course lesson</label>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-group" action="{{ route('lesson.update', $lesson->id) }}" method="post">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <input class="form-control" type="text" id="serial" name="serial" value="{{ $lesson->serial }}">

                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <!-- Edit Modal -->
                                    <div class="modal fade" id="exampleModalCenterEdit{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                          <label for="serial">Edit Lesson</label>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-group" action="{{ route('edit.lesson') }}" method="post">
                                            @csrf
                                            
                                        <div class="py-3">
                                                            <label for="lesson_title">Lesson Title</label>
                                        <input type="hidden" name="id" value="{{ $lesson->id }}">            
                                        <input type="text" name="lesson_title" placeholder="Enter Lesson title" class="form-control" id="lesson_title" value="{{ $lesson->lesson_title }}">
                                        </div>
                                
                                                        <div class="py-3">
                                                            <label for="lesson_video">Lesson Video</label>
                                                            <input type="text" name="lesson_video" class="form-control" id="lesson_video" value="{{ $lesson->lesson_video }}">
                                                            <div class="alert alert-primary">Go to Youtube -> Go to video you want to display -> click on share button below video. Copy that links and paste in above text box</div>
                                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                            <a href="{{  redirect()->back()->getTargetUrl() }}" class="btn btn-success">Go back</a>
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
