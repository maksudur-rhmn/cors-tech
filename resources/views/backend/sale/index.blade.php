@extends('layouts.admin-dashboard')


@section('title')
Akil - Sales
@endsection

@section('css')
        <!-- DataTables -->

        <link href="{{ asset('dashboard_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('mm-active-sale')
mm-active
@endsection

@section('active-sale')
active
@endsection

@section('breadcrumb-title')
Sales
@endsection

@section('breadcrumb')
Sales
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
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Course</th>
                                        <th>Username</th>
                                        <th>User email</th>
                                        <th>Payment ID</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Bought at</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $sale->getCourse->title ?? '' }}</td>
                                        <td>{{ $sale->getUser->name ?? '' }}</td>
                                        <td>{{ $sale->getUser->email ?? '' }}</td>
                                        <td>{{ $sale->payment_id }}</td>
                                        <td>
                                          @if($sale->status == 'pending')
                                            <span class="badge badge-danger">{{ ucfirst('failed') }}</span>
                                          @elseif($sale->status == 'paid')
                                            <span class="badge badge-success">{{ ucfirst($sale->status) }}</span>
                                          @endif
                                        </td>
                                        <td>EUR {{ $sale->price }}</td>
                                        <td>
                                          {{ $sale->created_at->format('d-M-Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <p>No data found</p>
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
