@extends('layouts.student-dashboard')

@section('cors-active')
    active
@endsection

@section('content')
    	
<div class="col-lg-9">
    <!-- black main -->
    <main class="black-main bg-dark-light">
        <div class="black-main-header">
            <h3 class="heading-sub heading-sub--white">{{ ucfirst($course->title) }}</h3>
        </div>

        <div class="row">
          <div class="col-lg-9">
            <video width="100%" controls>
              <source src="{{ asset('uploads/intro-videos') }}/{{ $course->introduction_video }}" type="video/mp4">
            Your browser does not support the video tag.
            </video>
          </div>
          <div class="col-lg-3">
						<!-- sidebar -->
						<aside class="black-sidebar">
							<div class="side-list-box bg-dark-light">
								<h3 class="heading-sub heading-sub--white">Lesson Lists</h3>

								<ul class="side-list">
									<li style="margin: 0 !important;text-align:left !important;"><a href="{{ route('my.course', $course->id) }}" class="active">01. Introduction Video</a></li>
                  @foreach ($course->getLessons as $lesson)
									<li style="margin: 0 !important;text-align:left !important;">
                    <a href="{{ url('/les') }}/{{ $course->slug }}/{{ $lesson->id }}/player">0{{ $lesson->serial + 1 }}  {{ $lesson->lesson_title }}</a>
                  </li>
                  @endforeach
								</ul>
							</div>
						</aside>
					</div>
        </div>
    </main>

</div>
</div>
</div>
</main>
@endsection
