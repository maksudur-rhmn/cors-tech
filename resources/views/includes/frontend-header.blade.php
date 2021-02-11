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
		<title>@yield('title')</title>
	</head>
	<body>
		<!-- Navbar Start -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="#">
				<div class="navbar-box">
                    
					<img src="{{ asset('cors_assets/img/icons/logo-black.png') }}" alt="" />
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
				<form class="nav-form">
					<input type="text" placeholder="Search" />
					<button class="nav-search">
						<i class="fas fa-search"></i>
					</button>
				</form>
				<ul class="navbar-nav ml-auto mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Becoome an Instructor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/home') }}">Courses</a>
					</li>
				 @guest
				 <li class="nav-item">
					<a class="nav-link" id="login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="register">Register</a>
				</li>
				 @endguest
				 @auth  
				 <li class="nav-item">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
					<a class="nav-link" href="{{ route('logout') }}"
					onclick="event.preventDefault();
								this.closest('form').submit();">
							{{ __('Logout') }}
					</a>
					</form>
				</li>
				<li>
					@if(isAdmin() == 'admin')
					<a href="{{ url('/dashboard') }}" class="nav-link">Admin Dashboard</a>
					@else 
					<a href="#" class="nav-link">Account</a>
					@endif
				</li>
				 @endauth
				</ul>
				<div class="nav-box">
					@auth
					<div class="nav-profile-box">
						<img src="{{ Auth::user()->profile_photo_url }}" alt="profile" />
					</div>
					@endauth
				</div>
			</div>
		</nav>
		<!-- Navbar Ends -->