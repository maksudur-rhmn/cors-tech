
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
        @yield('custom-css')
		<!-- Title -->
		<title>Cors Tech</title>

		<style>
			body,h1,h2,h3,h4,h5,h6,p,span,a {
				color :#000 !important;
			}
		</style>
		@yield('custom-css')
	</head>
	<body class="dark-mode">
		<!-- Navbar Start -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand text-white" href="{{ url('/') }}">
				<div class="navbar-box">
					<img src="{{ asset('cors_assets/img/icons/logo-black.png') }}" alt="cover" />
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
						<a class="nav-link text-white active" href="{{ url('/student') }}">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="{{ route('payment.history') }}">Invoices & Accounts</a>
					</li>
				</ul>
				<div class="nav-box">
					<div class="nav-burger-box"></div>
					<div class="nav-profile-box">
						<img src="{{ Auth::user()->profile_photo_url }}" alt="cover" />
					</div>
				</div>
			</div>
		</nav>
		<!-- Navbar Ends -->

		<!-- Black main starts -->
		<main class="black-main">
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
						<!-- sidebar -->
						<aside class="black-sidebar">
							<div class="side-list-box">
								<h3 class="heading-sub heading-sub--white">Shortcuts</h3>

								<ul class="side-list">
									<li><a href="{{ url('/student') }}" class="@yield('home-active')">Activity</a></li>
									<li><a href="{{ url('/foo') }}" class="@yield('cors-active')">My cors</a></li>
									<li><a href="{{ route('reviews.index') }}" class="@yield('review-active')">Reviews/Ratings</a></li>
									<li><a href="{{ route('payment.history') }}" class="@yield('history-active')">Payment Records</a></li>
									<li><a href="{{ url('/user/profile') }}">Account Settings</a></li>
									<li><a class="@yield('profile-active')" href="{{ route('coach.index') }}">Profile Settings</a></li>
								</ul>
							</div>
						</aside>
					</div>


                    @yield('content')

                    		<!-- Black main ends -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ asset('cors_assets/js/jquery.js') }}"></script>
		<script src="{{ asset('cors_assets/js/popper.js') }}"></script>
		<script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>

		<!-- Apex Chart -->
		<script src="{{ asset('cors_assets/js/apex-chart/apexcharts.min.js') }}"></script>
		<script src="{{ asset('cors_assets/js/apex-chart/stock-prices.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('cors_assets/js/main.js') }}"></script>
        @yield('footer-js')
	</body>
</html>