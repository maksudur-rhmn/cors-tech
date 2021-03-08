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

	        @if($errors->has('email') || $errors->has('password'))
            $("#logModal").modal();
            @endif

            @if($errors->has('register_name') || $errors->has('register_email') || $errors->has('register_password') || $errors->has('register_password_confirmation') || $errors->has('role') || $errors->has('agree'))
            $("#myModal").modal();
            @endif
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

		<!-- Filter Start -->
		<section class="filter">
			<div class="container">
				<ul class="filter-list">
					<li>
						<a href="{{ url('/home') }}" class="active">All the programmes</a>
					</li>
					@php
						$flag = 1;
					@endphp
					@forelse (categories() as $item)
					@foreach($item->getSubCategory->take(5) as $value)
					<li>
						<a href="{{ url('/search?sub=') }}{{ $value->id }}" class="
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
						<a href="{{ url('/search?field=') }}{{ $item->id }}">
						<div class="grid-box">
							<img src="{{ asset('uploads/categories') }}/{{ $item->image }}" alt="" />
							<div class="grid-footer">
								<i class="{{ ($item->category_name == 'Food Programme') ? 'fas fa-utensils' : 'far fa-clipboard' }}"></i>
								<p>{{ ucfirst($item->category_name) }}</p>
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</a>
					</div>
					@empty
						<p>No data found</p>
					@endforelse
					<div class="col-lg-3">
						<a href="{{ route('front.proximite') }}">
							<div class="grid-box">
								<img src="{{ asset('cors_assets/img/grid-img-3.jpg') }}" alt="">
								<div class="grid-footer">
									<i class="far fa-compass"></i>
									<p>Coach in proximity</p>
									<i class="fas fa-chevron-right"></i>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3">
					<a href="{{ route('front.proximiteuser') }}">
						<div class="grid-box">
							<img src="{{ asset('cors_assets/img/grid-img-4.jpg') }}" alt="">
							<div class="grid-footer">
								<i class="fas fa-user-clock"></i>
								<p>Teammate in proximite</p>
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</a>
					</div>
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
				<a href="{{ route('front.coachProfile', $item->id) }}">
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


