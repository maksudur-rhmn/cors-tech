
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Google fonts -->
		<!-- <link rel="preconnect" href="https://fonts.gstatic.com" /> -->
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
			rel="stylesheet"
		/>
		<!-- Font Awesome Css -->
        
		<link rel="stylesheet" href="{{ asset('cors_assets/css/font-awesome/css/all.css') }}" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('cors_assets/css/bootstrap.min.css') }}" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('cors_assets/css/main.css') }}" />
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('cors_assets/img/icons/logo-black.png') }}" />
		<!-- Title -->
		<title>Cors Tech</title>
	</head>
	<body class="dark-mode bg-blue">
		<!-- Navbar Start -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand text-white" href="#">
				<div class="navbar-box">
					<img src="{{ asset('cors_assets/img/icons/logo-white.png') }}" alt="" />
				</div>
				<span>Cors Tech</span>
			</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link text-white" href="{{ url('/trainer') }}">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white active" href="{{ url('/trainer') }}">Mes programmes</a>
					</li>
				</ul>
				<div class="nav-box">
					<div class="nav-burger-box"></div>
					<form class="nav-box-form">
						<input type="text" class="bg-main-light" />
						<i class="fas fa-search"></i>
					</form>
					<div class="nav-profile-box">
						<img src="{{ Auth::user()->profile_photo_url }}" alt="" />
					</div>
				</div>
			</div>
		</nav>
		<!-- Navbar Ends -->
		    
		<!-- Blue box start -->
		<main class="blue-box mb-5">
			<div class="container-fluid">
			@if(session('success'))
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				</div>
			</div>	
			@endif
				<div class="row">
					<div class="col-lg-3">
						<div class="blue-sidebar">
							<!-- Shortcuts -->
							<div class="side-list-box bg-main-light">
								<h3 class="heading-sub heading-sub--white">Shortcuts</h3>

								<ul class="side-list">
									<li><a href="{{ url('/trainer') }}" class="@yield('trainer-dash')">Dashboard</a></li>
									@if(Auth::user()->subscribed('Premium membership'))
									<li><a href="{{ route('trainer.create') }}" class="@yield('trainer-create')">Create course</a></li>
									@endif
									<li><a href="{{ route('trainerlesson.create') }}" class="@yield('lesson-create')">Add Lesson</a></li>
									<li><a href="#">All the clients</a></li>
									<li>
										<a href="#">All coaches <span>150</span></a>
									</li>
									<li><a href="#">Settings</a></li>
									<li><a href="#">Other</a></li>
								</ul>
							</div>

							<!-- program view -->
							<div class="program-view">
								<h3 class="heading-sub heading-sub--white">Create a program</h3>
								<p> Premium Member Area | <span>Subscription ends at : {{ nextCycle(Auth::id()) }}</span> </p>
								<div class="program-content">
									@if(Auth::user()->subscribed('Premium membership'))
									<a href="{{ route('trainer.create') }}" class="button button--outline-white-empty">Create course</a>
                                    @else
                                    <form action="{{ route('subscriptions.store', 'premium') }}" method="POST">
                                        @csrf
                                         <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                                         <button type="submit" class="button button--outline-white-empty">Subscribe now and start selling.</button>
                                    </form>
                                    @endif
								</div>
							</div>
						</div>
					</div>
     @yield('content')

     		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		{{-- <script src="{{ asset('cors_assets/js/jquery.js') }}"></script> --}}
		<script src="{{ asset('dashboard_assets/libs/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('cors_assets/js/popper.js') }}"></script>
		<script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>
		<!-- Apex Chart -->
		<script src="{{ asset('cors_assets/js/apex-chart/apexcharts.min.js') }}"></script>
		<script src="{{ asset('cors_assets/js/apex-chart/stock-prices.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('cors_assets/js/main.js') }}"></script>
		@yield('footer-script')
	</body>
</html>