@extends('layouts.frontend')

@section('title')
Akil - {{ $course->title }}
@endsection

@section('content')

<div class="m_container w-container">
    <div class="complete_course_field w-row">
      <div class="column w-col w-col-8 w-col-stack">
        <div class="m_course_section">
          <h1 class="normal_title course_title">{{ $course->title }}</h1>
          <h3 class="course_small_description">{{ $lesson->lesson_title }}.</h3>
        </div>
        <div class="w-embed w-script">
          <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css">
          <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>
          <style>
:root{
	--plyr-color-main: #f8d729;
}
</style>
          <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $lesson->lesson_video }}"></div>
          <script>
const player = new Plyr('#player', {});
window.player = player;
</script>
        </div>
        <p class="course_main_description">
            {{ $course->description }}
        </p>
        <h3 class="normal_heading">Course <strong class="accent">Timeline</strong>.</h3>
        @php
            $i = 1;
        @endphp
         <a href="{{ route('front.details', $course->slug) }}" class="lesson w-inline-block">
            <div class="lesson_number"><strong class="current">01</strong></div>
            <h4 class="lesson_title">{{ $course->title }}</h4>
          </a>
        @foreach ($course->getLessons as $lesson)
        <a href="{{ url('/courses') }}/{{ $course->slug }}/{{ $lesson->id }}" class="lesson w-inline-block">
            <div class="lesson_number"><strong class="current">0{{ $lesson->serial + 1 }}</strong></div>
            <h4 class="lesson_title">{{ $lesson->lesson_title }}</h4>
          </a>
        @php
            $i++;
        @endphp
        @endforeach
      </div>
      <div class="w-col w-col-4 w-col-stack">
        <div class="course_details">
          <a href="#" class="try_for_free_button w-inline-block">
            <div class="button_bg shadow"></div>
            <div class="text-block get_course">Your Course</div>
          </a>
          <div class="course_info"><strong class="detail">Lessons:</strong> <strong class="detail_data">{{ $course->getLessons->count() + 1 }}</strong></div>
          <div class="course_info"><strong class="detail">Category:</strong> <strong class="detail_data">{{ $course->getCategory->category_name }}</strong></div>
          <div class="course_info"><strong class="detail">Total Length:</strong> <strong class="detail_data">{{ $course->course_length }}</strong></div>
          <h3 class="normal_heading"><strong class="accent">featured</strong> courses.</h3>
          @forelse ($features as $feature)
                <a href="{{ route('front.details', $feature->slug) }}" class="course_thumbnail featured_course w-inline-block">
                    <div class="dark_overlay">
                        <div class="featured_course_title">{{ $feature->title }}</div>
                    </div><img src="{{ asset('uploads/course') }}/{{ $feature->cover_image }}" loading="lazy" alt="" class="image">
                </a>
                @empty
                    <p>There is no featured course at the moment.</p>
                @endforelse
            <a href="{{ route('front.courses') }}" class="see_more_courses">See more courses <strong class="arrow">&gt;</strong></a></div>
      </div>
    </div>
  </div>

@endsection
