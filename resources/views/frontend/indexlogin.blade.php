@extends('layouts.frontend')

@section('title')
	CORS TECH | Home
@endsection

@section('custom-js')
<script>
	$('#register').on('click', function(){

		$("#myModal").modal();
	})
	$('#login').on('click', function(){

		$("#logModal").modal();
	})
</script>
@endsection

@section('content')

<main class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Sidebar Start -->
				<aside class="sidebar">
					<div class="main-list-box">
						<form class="search-box">
							<input type="text" placeholder="Search..." />
							<button>
								<i class="fas fa-search"></i>
							</button>
						</form>
						<a href="#" class="main-list-title"> <h3>Categories</h3> </a>
						<ul class="main-list">
							<li class="active">
								<a href="#">All courses</a>
							</li>

							@foreach (categories() as $item)
							<li>
								<a href="#">{{ ucfirst($item->category_name) }}</a>
							</li>
							@endforeach
						</ul>
						<a href="#" class="main-list-title"
							><h3>Filters <span>add</span></h3></a
						>
					</div>

					<div class="main-register-box">
						<img src="{{ asset('cors_assets/img/icons/button-graphic.png') }}" class="main-register-background" alt="" />
						<h3>Account</h3>
						<p>Visit your dashboard</p>

						<a href="{{ url('/dashboard') }}" class="button button--outline-white">Dashboard</a>
					</div>
				</aside>
				<!-- Sidebar Ends -->
			</div>
			<div class="col-md-9">
				<!-- Main Content Start -->
				<section class="main-content">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a
								class="nav-link"
								id="program-tab"
								data-toggle="tab"
								href="#program"
								role="tab"
								aria-controls="program"
								aria-selected="true"
								>program</a
							>
						</li>
						<li class="nav-item" role="presentation">
							<a
								class="nav-link active"
								id="professional-tab"
								data-toggle="tab"
								href="#professional"
								role="tab"
								aria-controls="professional"
								aria-selected="false"
								>professional</a
							>
						</li>
						<li class="nav-item" role="presentation">
							<a
								class="nav-link"
								id="articles-tab"
								data-toggle="tab"
								href="#articles"
								role="tab"
								aria-controls="articles"
								aria-selected="false"
								>articles</a
							>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade" id="program" role="tabpanel" aria-labelledby="home-tab">
							<!-- program tab -->
							<h1>Program tab</h1>
						</div>
						<div
							class="tab-pane fade show active"
							id="professional"
							role="tabpanel"
							aria-labelledby="profile-tab"
						>
							<!-- professionl tab -->

							<!-- Filter Start -->
							<section class="filter">
								<ul class="filter-list">
									<li>
										<a href="#" class="active">All courses</a>
									</li>
									@php
										$flag = 1;
									@endphp
									@forelse (categories() as $item)
									@foreach($item->getSubCategory->take(5) as $value)
									<li>
										<a href="#" class="
											@if($flag == 1)
											green
											@elseif($flag == 2)
											blue
											@elseif($flag == 3)
											red
											@elseif($flag == 4)
											purple
											@elseif($flag == 5)
											orange
											@endif
										">{{ $value->name }}</a>
									</li>
									@php
										$flag++;
									@endphp
									@endforeach
									@empty
										<p>nothing found.</p>
									@endforelse
								</ul>
							</section>
							<!-- Filter Ends -->

							<!-- Quick Access Start -->
							<section class="grid grid--two">
								<div class="container-fluid">
									<h1>
										Pour vous <a href="#"><i class="fas fa-filter"></i></a>
									</h1>
									<div class="row">
										@forelse (courses() as $course)
										<div class="col-lg-4">
											<a href="">
											<div class="grid-box">
												
													<img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="" />
												
												<div class="grid-banner">
													<img
														src="{{ $course->getUser->profile_photo_url }}"
														class="grid-banner-avatar"
														alt=""
														class="grid-banner-profile"
													/>
													<div class="grid-banner-content">
														<span>Par</span>
														<p>{{ ucfirst($course->getUser->name) }}</p>
													</div>
												</div>
												<div class="grid-footer-box">
													<div class="grid-footer-side">
														<h3>{{ ucfirst($course->title) }}</h3>
														<div class="grid-footer-row">
															<p>{{ $course->length }}</p>
															{{-- <a href="#"><i class="far fa-comment"></i> 20 </a> --}}
														</div>
													</div>
													<div class="grid-footer-amount">{{ $course->price }}$</div>
												</div>
											</div>
										</a>
										</div>
										@empty
											<p>no courses available at the moment.</p>
										@endforelse
										
									</div>
								</div>
							</section>
							<!-- Quick Access Ends -->
						</div>
						<div
							class="tab-pane fade"
							id="articles"
							role="tabpanel"
							aria-labelledby="contact-tab"
						>
							<!-- Articles tab -->
							<h1>Articles tab</h1>
						</div>
					</div>
				</section>
				<!-- Main Content Ends -->
			</div>
		</div>
	</div>
</main>
@endsection


