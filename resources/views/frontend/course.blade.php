@extends('layouts.frontend')

@section('title')
Akil - Courses
@endsection

@section('content')
<div class="m_container w-container">
    <div class="complete_courses_list_field w-row">
        <div class="w-col w-col-8 w-col-stack">
          @if(session('success'))

          <div class="alert alert-success">
             <h2 class="course_small_description" style="color:green; padding-bottom:10px;">
                  {{ session('success') }}
             </h2>
          </div>
          @endif
            <h1 class="normal_title"><strong class="accent">ALL</strong> COURSES.</h1>
            <div class="w-layout-grid grid">
                @forelse ($courses as $course)
                <a id="w-node-f8f2acd29a99-cd1814dc" style="-ms-grid-column-align: start;
    justify-self: start;
    -ms-grid-column: span 1;
    grid-column-start: span 1;
    -ms-grid-row: span 1;
    grid-row-start: span 1;
    -ms-grid-column-span: 1;
    grid-column-end: span 1;
    -ms-grid-row-span: 1;
    grid-row-end: span 1;" href="{{ route('front.details', $course->slug) }}" class="course_in_list w-inline-block">
                    <div class="course_thumbnail">
                        <div class="dark_overlay">
                            <div class="featured_course_title">{{ $course->title }}</div>
                        </div>

                        <img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" loading="lazy" alt="" class="image">
                    </div>
                    @if(isBought($course->id))
                      <div class="text-block-3"><strong class="bold-text-3">Owned Course</strong></div>
                    @else
                      @if($course->status == 'free')
                        @auth
                          <div class="text-block-3"><strong class="bold-text-3">Owned Course</strong></div>
                        @else
                          <div class="text-block-3">€<strong class="bold-text-3">{{ $course->price }}</strong>,-</div>
                        @endauth
                      @else
                        <div class="text-block-3">€<strong class="bold-text-3">{{ $course->price }}</strong>,-</div>
                      @endif
                    @endif


                    <div class="course_info in_list"><strong class="detail">Lessons:</strong> <strong
                            class="detail_data">{{ $course->getLessons->count() + 1 }}</strong></div>
                    <div class="course_info in_list"><strong class="detail">Category:</strong> <strong
                            class="detail_data">{{ $course->getCategory->category_name }}</strong></div>
                    <div class="course_info in_list"><strong class="detail">Total Length:</strong> <strong
                            class="detail_data">{{ $course->course_length }}</strong></div>
                    <div class="course_info in_list"><strong class="detail">Status:</strong> <strong
                            class="detail_data">{{ $course->status }}</strong></div>
                </a>
                @empty
                    <h5 style="color: #fff;">No available courses at the moment</h5>
                @endforelse
            </div>
        </div>
        <div class="w-col w-col-4 w-col-stack">
            <div class="course_details">
                <h3 class="normal_heading"><strong class="accent">Search </strong>a course.</h3>
                <div class="w-form">
                    <form action="{{ route('front.search') }}" method="get">
                        <select id="field" name="field" class="search_course_txt_field w-select">
                            <option value=""> -Select category- </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="search_course_txt_field w-input"  placeholder="Course Name" id="course_search" name="q">
                        <input type="submit" style="margin-left: 0px !important;" class="small_button w-button" value="SEARCH">
                        </form>
                </div>
                <h3 class="normal_heading double_pad"><strong class="accent">featured</strong> courses.</h3>

                @forelse ($features as $feature)
                <a href="{{ route('front.details', $feature->slug) }}" class="course_thumbnail featured_course w-inline-block">
                    <div class="dark_overlay">
                        <div class="featured_course_title">{{ $feature->title }}</div>
                    </div><img src="{{ asset('uploads/course') }}/{{ $feature->cover_image }}" loading="lazy" alt="" class="image">
                </a>
                @empty
                    <p>There is no featured course at the moment.</p>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
