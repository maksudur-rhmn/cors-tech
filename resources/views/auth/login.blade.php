@extends('layouts.frontend')

@section('title')
	CORS TECH | Home
@endsection

@section('custom-js')
<script>
		$("#logModal").modal();
		
</script>
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

		<!-- Hero Start -->
		<header class="header">
			<div class="container">
				<div class="header-hero">
					<div class="hero-content">
						<h6>Rechercher</h6>
						<h1>A sport, a program, a coach</h1>
					</div>
					<div class="hero-cta">
						<form class="form-cta">
							<div class="form-cta-box">
								<img src="img/icons/search-icon.png" alt="" />
								<input type="text" placeholder="Football, reinforcement" />
							</div>
							<div class="form-cta-box">
								<img src="img/icons/category-icon.png" alt="" />
								<input type="text" placeholder="Categories" />
							</div>
							<div class="form-cta-box">
								<img src="img/icons/money-icon.png" alt="" />
								<input type="text" placeholder="Price" />
							</div>
						</form>
						<button class="form-cta-button">Go</button>
					</div>
				</div>
			</div>
		</header>
		<!-- Hero Ends -->

		<!-- Filter Start -->
		<section class="filter">
			<div class="container">
				<ul class="filter-list">
					<li>
						<a href="#" class="active">All the sports</a>
					</li>
					<li>
						<a href="#" class="green">Football</a>
					</li>
					<li>
						<a href="#" class="blue">Bodybuilding</a>
					</li>
					<li>
						<a href="#" class="red">Health</a>
					</li>
					<li>
						<a href="#" class="purple">Courses</a>
					</li>
					<li>
						<a href="#" class="orange">Fit</a>
					</li>
				</ul>
			</div>
		</section>
		<!-- Filter Ends -->

		<!-- Quick Access Start -->
		<section class="grid">
			<div class="container">
				<h5 class="grid-heading">Programmes</h5>
				<div class="row">
					@forelse (categories()->take(4) as $item)
					<div class="col-lg-3">
						<div class="grid-box">
							<img src="{{ asset('uploads/categories') }}/{{ $item->image }}" alt="" />
							<div class="grid-footer">
								<i class="{{ ($item->category_name == 'Food Programme') ? 'fas fa-utensils' : 'far fa-clipboard' }}"></i>
								<p>{{ ucfirst($item->category_name) }}</p>
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
					@empty
						<p>No data found</p>
					@endforelse
					
				</div>
			</div>
		</section>
		<!-- Quick Access Ends -->

		<!-- Coaches Of The Moment Start -->
		<section class="grid grid--one">
			<div class="container">
				<h5 class="grid-heading">OUR COACHES OF THE MOMENT</h5>
				<div class="row">
				@forelse (trainers() as $item)
				<div class="col-lg-3">
					<div class="grid-box">
						<img src="{{ $item->profile_photo_url }}" alt="" />
						<div class="grid-footer">
							<div class="grid-footer-main">
								<div class="grid-footer-row">
									<i class="fas fa-check-circle"></i>
									<h5>{{ $item->name }}</h5>
								</div>
								<span>{{ $item->getCourse->count() }} programs</span>
							</div>
							<div class="grid-footer-rating">
								<span>5/5</span>
								<i class="fas fa-star"></i>
							</div>
						</div>
					</div>
				</div>
				@empty
					<p>No trainers found.</p>
				@endforelse
				</div>
			</div>
		</section>
		<!-- Coaches Of The Moment Ends -->
@endsection


