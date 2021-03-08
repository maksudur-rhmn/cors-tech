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

		<!-- Hero Start -->
		<header class="header">
			<div class="container">
				<div class="header-hero">
					<div class="hero-content">
						<h6>Rechercher</h6>
						<h1>A sport, a program, a coach</h1>
					</div>
					<div class="hero-cta">
						<form id="my-form" class="form-cta" action="{{ route('front.search') }}" method="get">
							<div class="form-cta-box">
								
								<img src="{{ asset('cors_assets/img/icons/search-icon.png') }}" alt="" />
								<input type="text" name="q" placeholder="Football, reinforcement" />
							</div>
							<div class="form-cta-box">
								<img src="{{ asset('cors_assets/img/icons/category-icon.png') }}" alt="" />
								<input type="text" name="q" placeholder="Football, reinforcement" />
							</div>
							<div class="form-cta-box">
								<img src="{{ asset('cors_assets/img/icons/money-icon.png') }}" alt="" />
								<input type="text" placeholder="Price"  name="p"/>
							</div>
						
						</form>
						<button type="submit" form='my-form' class="form-cta-button">Go</button>
					</div>
				</div>
			</div>
		</header>
		<!-- Hero Ends -->


		<!-- Coaches Of The Moment Start -->
		<section class="grid grid--one">
			<div class="container">
				<h5 class="grid-heading">TEAMMATES IN YOUR PROXIMITY</h5>
				<div class="row">
				@forelse ($trainers as $item)
				<div class="col-lg-3">
				<a href="{{ route('front.userProfile', $item->id) }}">
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
				</a>
				</div>
				@empty
					<p>No trainers found.</p>
				@endforelse
				</div>
			</div>
		</section>
		<!-- Coaches Of The Moment Ends -->
@endsection


