
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
        <style>
          
        </style>
	</head>
	<body class="dark-mode bg-darkmode">
		<!-- Navbar Start -->
			<!-- Navbar Start -->
			<nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="navbar-box">
                        <img src="{{ asset('cors_assets/img/icons/logo-white.png') }}" alt="" />
                    </div>
                    <span style="color: #fff;">Cors Tech</span>
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
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item">
                            <a style="color:#fff !important;" class="nav-link" href="{{ url('/become/an/instructor') }}">Become an Instructor</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:#fff !important;" class="nav-link" href="{{ url('/home') }}">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:#fff !important;" class="nav-link" href="{{ url('/our/app') }}">Our Apps</a>
                        </li>
                     @guest
                     <li class="nav-item">
                        <a style="color:#fff !important;" class="nav-link" id="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a style="color:#fff !important;" class="nav-link" id="register">Register</a>
                    </li>
                     @endguest
                     @auth  
                     <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <a style="color:#fff !important;" class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Logout') }}
                        </a>
                        </form>
                    </li>
                    <li>
                        @if(isAdmin() == 'admin')
                        <a style="color:#fff !important;" href="{{ url('/dashboard') }}" class="nav-link">Admin Dashboard</a>
                        @else 
                        <a style="color:#fff !important;" href="{{ url('/dashboard') }}" class="nav-link">Account</a>
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
		<!-- Navbar Ends -->

		<!-- Dark section -->
		<section class="dark text-right">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<div class="dark-image">
                            
							<img src="{{ asset('cors_assets/img/phone-1.png') }}" alt="phone-image" />
						</div>
					</div>
					<div class="col-lg-8">
						<div class="dark-content">
							<h1 class="heading-sm heading-sm--white">Your coach everywhere.</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet ullamcorper
								ipsum, vitae congue orci. Morbi et convallis mi. Aenean posuere, lacus eu luctus
								mollis, ex libero sollicitudin dui, fringilla cursus lorem sapien id justo. Sed
								varius, mauris vel viverra elementum, lectus nibh ullamcorper augue, vitae
								sollicitudin lacus arcu at quam.
							</p>
							<a href="#" class="button button--outline-white-empty">Registration </a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Dark ends -->

		<!-- Dark section -->
		<section class="dark">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="dark-content">
							<h1 class="heading-sm heading-sm--white">Complete sessions.</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet ullamcorper
								ipsum, vitae congue orci. Morbi et convallis mi. Aenean posuere, lacus eu luctus
								mollis, ex libero sollicitudin dui, fringilla cursus lorem sapien id justo. Sed
								varius, mauris vel viverra elementum, lectus nibh ullamcorper augue, vitae
								sollicitudin lacus arcu at quam.
							</p>
							<a href="#" class="button button--outline-white-empty">Discover</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="dark-image">
							<img src="{{ asset('cors_assets/img/phone-2.png') }}" alt="phone-image" />
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Dark ends -->

		<!-- Dark section -->
		<section class="dark text-right">
			<img src="{{ asset('cors_assets/img/phone-3.png') }}" class="sticky-left" alt="phone-image" />

			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-5"></div>
					<div class="col-lg-7">
						<div class="dark-content sticky-content">
							<h1 class="heading-sm heading-sm--white">Long-term monitoring.</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet ullamcorper
								ipsum, vitae congue orci. Morbi et convallis mi.
							</p>
							<img src="{{ asset('cors_assets/img/strip.png') }}" alt="strip-image" />
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Dark ends -->

		<!-- Grid start -->
		<section class="grid grid--one dark-programs">
			<div class="container">
				<h1 class="heading-sub heading-sub--white">Discover</h1>
				<h1 class="heading-sm heading-sm--white">Long-term monitoring.</h1>

				<div class="row">
                    @forelse (trainers() as $item)
					
                    <div class="col-lg-3">
                        <div class="grid-box">
							
                            <img src="{{ $item->profile_photo_url }}" alt="" />
						   
                            <div class="grid-footer">
                                <div class="grid-footer-main">
                                    <div class="grid-footer-row">

                                       <a style="text-decoration: none !important;" href="{{ route('front.coachProfile', $item->id) }}"> 
										<h5>{{ $item->name }}</h5>
									   </a>
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

				<a href="{{ url('/home') }}">See all programs</a>
			</div>
		</section>
		<!-- Grid end -->

		<!-- Black starts -->
		<section class="black">
			<h1 class="heading-sm heading-sm--white">Download our app</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur <br />
				adipiscing elit. Etiam sit amet ullamcorper ipsum,<br />
				vitae congue orci. Morbi et convallis mi
			</p>
			<div class="black-button-box">
				<a href="#" class="button button--outline-white-empty">Download in iOS</a>
				<a href="#" class="button button--outline-white-empty">Download in Android </a>
			</div>
			<h3>A problem? <a href="{{ url('/contact') }}">Contact-Us</a></h3>
			<h3>2020 - Copyright CorsWeb</h3>
		</section>
		<!-- Black ends -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{ asset('cors_assets/js/jquery.js') }}"></script>
		<script src="{{ asset('cors_assets/js/popper.js') }}"></script>
		<script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('cors_assets/js/main.js') }}"></script>
	</body>
</html>
