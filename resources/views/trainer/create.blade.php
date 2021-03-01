@extends('layouts.trainer-dashboard')

@section('trainer-create')
    active
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
  
            <div class="col-lg-9">
                <div class="main-dashboard">
                    <h3 class="heading-sub heading-sub--white mb-30">Créer un exercice simple</h3>

                    <form action="{{ route('course.store') }}" method="POST" class="form-dashboard" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="dashboard-label mb-10">NAME OF COURSE</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Name of Course
                                            "
                                            name="title"
                                        />
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-7">
                                        <label class="dashboard-label mb-10">CATEGORY</label>
                                        <div class="dashboard-select-wrapper mb-30">
                                        <select class="dashboard-select" name="category_id" id="category">
                                            <option value=""> -Select Category- </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                            @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">SUB CATEGORY</label>
                                        <div class="dashboard-select-wrapper mb-30">
                                        <select name="sub_category_id" class="dashboard-select" id="subcategory" required>
                                            <option value=""> -Select Sub Category- </option>
                                            @error('sub_category_id')
                                             <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">SLUG (Optional)</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="SLUG
                                            "
                                            name="slug"
                                        />
                                        @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="dashboard-label mb-10">PRICE</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Price
                                            "
                                            name="price"
                                        />
                                        @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">COURSE LENGTH</label>
                                        <input
                                            type="text"
                                            class="dashboard-input mb-30"
                                            placeholder="Price
                                            "
                                            name="course_length"
                                        />
                                        @error('course_length')
                                        <small class="text-danger">{{ $message }}</small>
                                       @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">SHORT DESCRIPTION</label>
                                        <textarea
                                            rows="3"
                                            class="dashboard-comment mb-30"
                                            placeholder="Describe the instructions"
                                            name="short_description"
                                        ></textarea>
                                        @error('short_description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10">LONG DESCRIPTION</label>
                                        <textarea
                                            rows="3"
                                            class="dashboard-comment mb-30"
                                            placeholder="Describe the instructions"
                                            name="description"
                                        ></textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="dashboard-label mb-10"> EXPLANATORY VIDEO</label>

                                        <div class="row">
                                            <input type="hidden" name="status" value="paid">
                                            <div class="col-lg-6">
                                                <div class="dotted-card mb-10">
                                                    <i class="fas fa-file-upload"></i>
                                                    <p>UPLOAD YOUR VIDEO</p>
                                                    <input type="file" name="introduction_video">
                                                    @error('introduction_video')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="dotted-card mb-10">
                                                    <i class="fas fa-image"></i>
                                                    <p>COURSE COVER IMAGE</p>
                                                    <input type="file" name="cover_image">
                                                    @error('cover_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="dashboard-footer">
                                                <a href="{{ route('course.store') }}"  onclick="event.preventDefault();
                                                this.closest('form').submit();"class="button button--white">Save</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection