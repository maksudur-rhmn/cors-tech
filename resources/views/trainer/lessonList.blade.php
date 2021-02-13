@extends('layouts.trainer-dashboard')

@section('lesson-create')
	active
@endsection
@section('content')
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-12">
								<!-- Sales -->
								<div class="sales bg-main-light">
									<h3 class="heading-sub heading-sub--white">Mes Lessons</h3>

									<div class="sales-table">
										<div class="sales-header">
                                            <span>Sl.</span>
											<span>Lesson Title</span>
											<span>Video</span>
											<span>Delete</span>
										</div>
										@forelse ($lessons as $lesson)
										<div class="sales-row">
											<div>{{ $lesson->serial }}</div>
											<div>{{ $lesson->lesson_title }}</div>
                                                <video width="240" height="240" controls>
                                                    <source src="{{ asset('uploads/lesson-videos') }}/{{ $lesson->lesson_video }}" type="video/mp4">
                                                  Your browser does not support the video tag.
                                                  </video>
											<div class="sales-money">
                                                <form action="{{ route('lesson.destroy', $lesson->id) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
											</div>
										</div>
										@empty
										<h4 class="py-5">
											There is no lessons added for your programmes.
										</h4>
										@endforelse
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Blue box ends -->

@endsection