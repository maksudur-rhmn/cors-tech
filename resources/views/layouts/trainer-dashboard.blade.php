
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
						<a class="nav-link text-white" href="#">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white active" href="#">Mes programmes</a>
					</li>
				</ul>
				<div class="nav-box">
					<div class="nav-burger-box"></div>
					<form class="nav-box-form">
						<input type="text" class="bg-main-light" />
						<i class="fas fa-search"></i>
					</form>
					<div class="nav-profile-box">
						<img src="{{ asset('cors_assets/img/icons/profile.png') }}" alt="" />
					</div>
				</div>
			</div>
		</nav>
		<!-- Navbar Ends -->
     @yield('content')

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
	</body>
</html>