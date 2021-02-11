@extends('layouts.admin-dashboard')


@section('title')
CORS TECH - Fitness Site Admin
@endsection

@section('css')
        <!-- DataTables -->

        <link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('mm-active1')
mm-active
@endsection

@section('active1')
active
@endsection

@section('breadcrumb-title')
Dashboard
@endsection

@section('breadcrumb')
Dashboard
@endsection

@section('content')


                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">

                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ totalCourses() }}</span></h4>
                                            <p class="text-muted mb-0">Courses</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">total course we offer.
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">

                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ totalSales() }}</span></h4>
                                            <p class="text-muted mb-0">Sales</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">number of courses sold.
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">

                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ totalSubscribers() }}</span></h4>
                                            <p class="text-muted mb-0">Total subscribers</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">count of total premium members
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right mt-2">

                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ totalLessons() }}</span>+ </h4>
                                            <p class="text-muted mb-0">Lessons</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">total lessons available in all courses
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                        {{-- Alert Message --}}

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                        @endif
                        <div class="row py-5">
                            <div class="col-12">
                                <div class="card">
                                  <div class="card-header">
                                     <h3>Admin List</h3>
                                  </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Registered at</th>
                                                    <th>Role</th>
                                                    <th>Course Bought</th>
                                                    <th>Active Plan</th>
                                                    <th>Next Payment</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @forelse ($admins as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>{{ userCourse($user->id) }}</td>
                                                    <td>
                                                      @if($user->subscribed('Premium membership'))
                                                        Premium member
                                                      @else
                                                        Normal user
                                                      @endif
                                                    </td>
                                                    <td>
                                                       @if ($user->subscribed('Premium membership'))
                                                         {{ nextCycle($user->id) }}
                                                       @else
                                                         No active plan
                                                       @endif
                                                    </td>
                                                    <td>
                                                      @if ($user->role == 'admin')
                                                        <a href="{{ route('revoke.admin', $user->id) }}" class="btn btn-danger">Revoke role</a>
                                                      @elseif($user->role == 'student')
                                                        <a href="{{ route('create.admin', $user->id) }}" class="btn btn-success">Make Admin</a>
                                                      @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>no data available</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row py-5">
                            <div class="col-12">
                                <div class="card">
                                  <div class="card-header">
                                     <h3>Student List</h3>
                                  </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Registered at</th>
                                                    <th>Role</th>
                                                    <th>Course Bought</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @forelse ($students as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>{{ userCourse($user->id) }}</td>
                                                    <td>
                                                      @if ($user->role == 'admin')
                                                        <a href="{{ route('revoke.admin', $user->id) }}" class="btn btn-danger">Revoke role</a>
                                                      @elseif($user->role == 'student')
                                                        <a href="{{ route('create.admin', $user->id) }}" class="btn btn-success">Make Admin</a>
                                                      @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>no data available</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="row py-5">
                            <div class="col-12">
                                <div class="card">
                                  <div class="card-header">
                                     <h3>Trainer List</h3>
                                  </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Registered at</th>
                                                    <th>Role</th>
                                                    <th>Course Uploaded</th>
                                                    <th>Active Plan</th>
                                                    <th>Next Payment</th>
                                                    <th>Total Revenue</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @forelse ($trainers as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                    <td>{{ ucfirst($user->role) }}</td>
                                                    <td>{{ $user->getCourse->count() }}</td>
                                                    <td>
                                                      @if($user->subscribed('Premium membership'))
                                                        Premium member
                                                      @else
                                                        Normal user
                                                      @endif
                                                    </td>
                                                    <td>
                                                       @if ($user->subscribed('Premium membership'))
                                                         {{ nextCycle($user->id) }}
                                                       @else
                                                         No active plan
                                                       @endif
                                                    </td>
                                                    <td>
                                                        N/A
                                                    </td>
                                                    <td>
                                                      @if ($user->role == 'coach')
                                                        <a href="{{ route('revoke.admin', $user->id) }}" class="btn btn-danger">Demote trainer</a>
                                                      @elseif($user->role == 'coach')
                                                        <a href="{{ route('create.admin', $user->id) }}" class="btn btn-success">Make Admin</a>
                                                      @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>no data available</p>
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
