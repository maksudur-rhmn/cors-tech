@extends('layouts.admin-dashboard')


@section('title')
CORS TECH - Edit Course
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
Edit {{ $course->title }}
@endsection


@section('footer-script')
<script>
    $(document).ready(function(){
       $("#category").change(function(){
           var category_id = $(this).val();
           // Ajax Setup Starts
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
         // Ajax Setup Ends

         // Ajax Request Starts

            $.ajax({
                type:'POST',
                url:'/get/sub/category',
                data:{category_id:category_id},
                success:function(data){
                    $("#subcategory").html(data);
                }
            });
            

         // Ajax Request Ends
       });
    });
</script>
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
                    <h3 class="d-inline-block">Edit Course</h3>
                    <a href="{{ route('category.index') }}" class="btn btn-success btn-sm float-right" target="_blank">+ Add new category</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('course.update', $course->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="py-3">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ $course->title }}">
                            @error('title')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="category">Category list (Add a new category if you cannot find an existing category of your choice)</label>
                            <select class="form-control" name="category_id" id="category">
                                <option value="{{ $course->category_id }}"> {{ $course->getCategory->category_name }} </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                @error('category_id')
                                 <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>

                        <div class="py-3">
                            <label for="subcategory">SubCategory list (Add a new category if you cannot find an existing category of your choice)</label>
                            <select class="form-control" name="sub_category_id" id="subcategory">
                                <option value="{{ $course->sub_category_id }}"> {{ $course->getSubCategory->name }} </option>
                                @error('subcategory')
                                 <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>

                        <div class="py-3">
                            <label for="slug">Slug (This will be automatically generated if left empty)</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $course->slug }}">
                            @error('slug')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="short_description">Short description (One line preferred)</label>
                            <input type="text" name="short_description" id="short_description" class="form-control" value="{{ $course->short_description }}">
                            @error('slug')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $course->description }}</textarea>
                            @error('description')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="price">Price in EUR</label>
                            <input type="number" class="form-control" name="price" value="{{ $course->price }}">
                            @error('price')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="stat">Status</label>
                            <select class="form-control" name="status" id="stat">
                                <option value="{{ $course->status }}"> {{ $course->status }} </option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                                <option value="free for subscribers">Free for Subscribers</option>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        </div>

                        <div class="py-3">
                            <label for="course_length">Course length</label>
                            <input id="course_length" type="text" class="form-control" name="course_length"  value="{{ $course->course_length }}">
                            @error('course_length')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="introduction_video">Course intro video</label>
                            <input type="text" class="form-control" name="introduction_video" value="{{ $course->introduction_video }}">
                            <div class="alert alert-primary">Go to Youtube -> Go to video you want to display -> click on share button below video. Copy that links and paste in above text box</div>
                            @error('introduction_video')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="cover_image">Course cover image</label>
                            <input type="file" class="form-control" name="cover_image">
                            <div class="text-center py-3">
                                <img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="Not found" width="200">
                            </div>
                            @error('cover_image')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="feature">Feature this course</label>
                            <select class="form-control" name="feature" id="feature">
                                <option value="{{ $course->feature }}">{{ ucfirst($course->feature) }}</option>
                                @if($course->feature == 'no')
                                <option value="yes">Yes</option>
                                @else 
                                <option value="no">No</option>
                                @endif
                            </select>
                        </div>

                        <div class="py-3">
                            <label for="meta_title">Meta title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $course->meta_title }}">
                            @error('meta_title')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="meta_description">Meta description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control">{{ $course->meta_description }}</textarea>
                            @error('meta_description')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="py-3">
                            <label for="meta_keywords">Meta keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ $course->meta_description }}</textarea>
                            @error('meta_keywords')
                             <small class="text-danger">{{ $message }}</small>
                            @enderror
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