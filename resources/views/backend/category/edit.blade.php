@extends('layouts.admin-dashboard')


@section('title')
Akil - Category lists
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('mm-active-category')
mm-active
@endsection

@section('active-category')
active 
@endsection

@section('breadcrumb-title')
Category
@endsection

@section('breadcrumb')
{{ $category->category_name }}
@endsection

@section('content')
    <div class="row py-5">
        <div class="col-lg-8 m-auto">
            {{-- Success Alert --}}

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="py-3">
                            <label for="name">Category</label>
                            <input id="name" type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                            @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="py-3">
                            <label for="name">Category Image</label>
                            <input id="name" type="file" class="form-control" name="image">
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3 text-center m-auto">
                            <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" width="200" alt="">
                        </div>
        
                        <div class="py-3">
                            <button class="btn btn-primary text-center" type="submit">Update</button>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection
