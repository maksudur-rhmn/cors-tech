@extends('layouts.admin-dashboard')


@section('title')
CORS TECH - Category & SubCategory lists
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
Category
@endsection

@section('content')
{{-- Success Alert --}}

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
    <div class="row py-5">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf

                        <div class="py-3">
                            <label for="name">Category</label>
                            <input id="name" type="text" class="form-control" name="category_name" placeholder="Category name" value="{{ old('category_name') }}">
                            @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="name">Category Image</label>
                            <input id="name" type="file" class="form-control" name="image" placeholder="Category name" value="{{ old('category_name') }}">
                            @error('image')
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
        <div class="col-lg-6">
           <div class="card">
               <div class="card-header">
                   <h3>All Categories</h3>
               </div>
               <div class="card-body">
                <div class="table table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Category has</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop-> index + 1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->getCourse->count() }} {{ ($category->getCourse->count() <= 1) ? 'Course' : 'Courses' }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" width="60" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="mr-2"><i class="fas fa-edit text-warning"></i></a>
                                        <a href="{{ url('/delete') }}/{{ $category->id }}"><i class="far fa-trash-alt text-danger"></i></a>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
               </div>
           </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    <h3>Add Sub Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="POST" class="form-group">
                        @csrf

                        <div class="py-3">
                            <label for="name">Select Category</label>
                            <select name="category_id" id="name" class="form-control">
                                <option value=""> -Select Category- </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ ucfirst($category->category_name) }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="py-3">
                            <label for="name">Sub Category</label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Category name" value="{{ old('category_name') }}">
                            @error('name')
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
        <div class="col-lg-6">
           <div class="card">
               <div class="card-header">
                   <h3>All Categories</h3>
               </div>
               <div class="card-body">
                <div class="table table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>SubCategory Name</th>
                                <th>Category has</th>
                                <th>Belongs to</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $loop-> index + 1 }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $subcategory->getCourse->count() }} {{ ($category->getCourse->count() <= 1) ? 'Course' : 'Courses' }}</td>
                                    <td>{{ $subcategory->getCategory->category_name }}</td>
                                    <td>
                                        <a href="{{ url('subcategory/delete/') }}/{{ $subcategory->id }}"><i class="far fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
