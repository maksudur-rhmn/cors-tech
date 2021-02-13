@extends('layouts.trainer-dashboard')

@section('programme-delete')
	active
@endsection
@section('content')

					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-12">
								<!-- Sales -->
								<div class="sales bg-main-light">
									<h3 class="heading-sub heading-sub--white">Mes Programmes</h3>

									<div class="sales-table">
										<div class="sales-header">
											<span>Name</span>
											<span>Prog</span>
											<span>Lessons</span>
											<span>Delete</span>
										
										</div>
										@forelse ($myProgrammes as $myProgramme)
										<div class="sales-row">
											<div>{{ ucfirst($myProgramme->title) }}</div>
											<div>{{ $myProgramme->getCategory->category_name ?? '' }}</div>
											<div>
												<a href="{{ route('trainerlesson.list', $myProgramme->id) }}" class="btn btn-primary">View Lessons ({{ $myProgramme->getLessons->count() }})  </a>
											</div>
											<div class="sales-money">
												<a href="{{ route('course.delete', $myProgramme->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
											</div>
										</div>
										@empty
										<h4 class="py-5">
											There is no course.
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