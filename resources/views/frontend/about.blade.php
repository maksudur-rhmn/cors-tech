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
		<title>CORS TECH | ABOUT</title>
	</head>
	<body>
		<!-- header background cover -->
		<section class="bg-cover bg-cover--1" style="background-image: linear-gradient(to bottom, black, transparent), url({{ asset('cors_assets/img/cover-bg.jpg') }});">
			<!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Become an Instructor</a>
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
                        <a href="{{ url('/dashboard') }}" class="nav-link">Account</a>
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

			<div class="bg-cover-content">
				<h1 class="heading heading--white">About Us</h1>
				<p>{{ about()->banner_desc }}</p>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">Our Goal</h1>
				<p class="landing-text">
					{{ about()->our_goal_desc }}
				</p>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">Just Start</h1>
				<div class="row">
					<div class="col-lg-4">
						<div class="landing-box">
							<span class="landing-num">1</span>
							<h3 class="heading-xs heading-xs--main">Sign up</h3>
							<p class="landing-paragraph">
								{{ about()->just_start_one }}
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="landing-box">
							<span class="landing-num">2</span>
							<h3 class="heading-xs heading-xs--main">Buy your programs</h3>
							<p class="landing-paragraph">
								{{ about()->just_start_two }}
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="landing-box">
							<span class="landing-num">3</span>
							<h3 class="heading-xs heading-xs--main">Improve yourself</h3>
							<p class="landing-paragraph">
								{{ about()->just_start_three }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">Benefits</h1>
				<div class="row">
					<div class="col-lg-4">
						<div class="landing-box">
							<figure class="landing-icon"><img src="{{ asset('cors_assets/img/landing-icon-1.jpg') }}" alt="" /></figure>
							<h3 class="heading-xs heading-xs--main">Sign up</h3>
							<p class="landing-paragraph">
								{{ about()->benefits_one }}
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="landing-box">
							<figure class="landing-icon"><img src="{{ asset('cors_assets/img/landing-icon-2.jpg') }}" alt="" /></figure>

							<h3 class="heading-xs heading-xs--main">Buy your programs</h3>
							<p class="landing-paragraph">
								{{ about()->benefits_two }}
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="landing-box">
							<figure class="landing-icon"><img src="{{ asset('cors_assets/img/landing-icon-3.jpg') }}" alt="" /></figure>

							<h3 class="heading-xs heading-xs--main">Improve yourself</h3>
							<p class="landing-paragraph">
								{{ about()->benefits_three }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">Team Cors Tech</h1>
				<div class="row">
					@forelse (admins()->take(3) as $item)
                    <div class="col-lg-4">
						<div class="landing-social">
							<div class="landing-social-avatar">
								<figure class="landing-avatar">
									<img src="{{ $item->profile_photo_url }}" alt="" />
								</figure>
							</div>
							<div class="landing-social-content">
								<h3 class="heading-xs heading-xs--main">{{ ucfirst($item->name) }}</h3>
								<h4 class="mb-5">CEO Cors Tech</h4>
								<a href="#"><i class="fab fa-instagram mr-2"></i> @mariie </a>
							</div>
						</div>
					</div>
                    @empty
                        
                    @endforelse
				</div>
			</div>
		</section>

		<section class="landing bg-black">
			<div class="container">
				<h1 class="heading-sm heading--white mb-5">Why Cors tech?</h1>
				<p class="landing-text text-white mb-5">
					{{ about()->why_cors }}
				</p>
				<a href="{{ url('/') }}" class="button button--outline-white-empty">Discover all training</a>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">IIs ont choisis Cors Tech</h1>
				<div class="row">
					@foreach (trainers()->take(3) as $item)
                    <div class="col-lg-4">
						<div class="landing-social">
							<div class="landing-social-avatar">
								<figure class="landing-avatar mb-2">
									<img src="{{ $item->profile_photo_url }}" alt="" />
								</figure>
								<a href="#"><i class="fab fa-instagram mr-2"></i> @mariie </a>
							</div>
							<div class="landing-social-content">
								<h3 class="heading-xs heading-xs--main">{{ ucfirst($item->name) }}</h3>
								<h4>Trainer</h4>
								<div class="landing-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</section>

		<section class="landing bg-black">
			<div class="container">
				<h1 class="heading-sm heading--white mb-5">In a few numbers</h1>

				<div class="row">
					<div class="col-lg-3">
						<div class="landing-block">
							<h1 class="heading-xs heading-xs--white">{{ students()->count() }}</h1>
							<p>Satisfied customers</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="landing-block">
							<h1 class="heading-xs heading-xs--white">+{{ courses()->count() }}</h1>
							<p>Training</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="landing-block">
							<h1 class="heading-xs heading-xs--white">{{ trainers()->count() }}</h1>
							<p>Professional trainers</p>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="landing-block">
							<h1 class="heading-xs heading-xs--white">120k</h1>
							<p>Kg Lost/year</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="landing">
			<div class="container">
				<h1 class="heading-sm heading--main mb-3">Need help?</h1>
				<p class="landing-text mb-5">
					If you have any help, visit our website, Help and Support section
				</p>
				<a class="button button--outline-main-empty">Consult help</a>
			</div>
		</section>

		<footer class="landing-footer bg-black">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<div class="text-center text-lg-left">
							<a href="#">
								<img src="{{ asset('cors_assets/img/icons/logo-white.png') }}" alt="logo" />
							</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="text-center text-lg-right">&copy;copyright 2021 - Cors Tech</div>
					</div>
				</div>
			</div>
		</footer>


        <!-- Modal -->
<div
class="modal fade"
id="myModal"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog modal-dialog--sm modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <div class="ml-auto">
                <h1 class="color-main">Registration particular</h1>
                <h4 class="color-main font-weight-bold">Already have an account ? Log in</h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="modal-form py-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="modal-input">
                            <label for="">Your Pseudo</label>
                            <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="text-field w-input" id="name" />
                            <label for="">Password</label>
                            <input type="password" name="password" required autocomplete="new-password" class="text-field w-input" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-input">
                            <label for="">Your addresse email</label>
                            <input type="email" name="email" :value="old('email')" required  id="email" class="text-field w-input" />
                        </div>
                        <div class="modal-input">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password" id="password_confirm" class="text-field w-input" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="modal-input">
                            <label for="">Register as</label>
                            <select class="form-control" name="role" id="">
                                <option value="student">Student</option>
                                <option value="coach">Trainer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-checkbox">
                    <input name="agree" type="checkbox" />
                    <label for=""
                        >I accept the <a href="#">CGU</a> et <a href="#">CGV</a> of site Cors Tech</label
                    >
                </div>
                <button type="submit" class="button button--outline-main-empty">Register</button>
            </form>
            <div class="modal-social">
                {{-- <div class="modal-social-box">
                    <button class="modal-social--button modal-social--facebook">
                        <i class="fab fa-facebook-f"></i>
                        Login via Facebook
                    </button>
                </div>
                <div class="modal-social-box">
                    <button class="modal-social--button modal-social--google">
                        <i class="fab fa-google"></i>
                        Login by Google
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>

		<!-- Modal -->
		<div
			class="modal fade"
			id="logModal"
			tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog--sm modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="ml-auto">
							<h1 class="color-main">Personal space</h1>
							<h4 class="color-main font-weight-bold">No account yet? Sign up</h4>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<figure class="modal-avatar"><img src="img/modal-cover-1.jpg" alt="" /></figure>
						<form class="modal-form" id="email-form" method="POST" action="{{ route('login') }}" class="access_form">
                            @csrf
							<div class="modal-input">
								<label for="">Your Email Address</label>
                                <input type="email" name="email" :value="old('email')" required autofocus class="text-field w-input" autofocus="true" maxlength="256"  id="email" required="" />
							</div>
							<div class="modal-input"><label for="">Password</label>
                                <input type="password" name="password" required autocomplete="current-password" class="text-field w-input" maxlength="256"  id="password" />
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="footer-link forgot_password"><h4 class="color-main font-weight-bold mb-3">Forgot Password? </h4></a>
                            @endif
                          <button type="submit" class="button button--outline-main-empty">Login</button>
						</form>
						{{-- <div class="modal-social">
							<div class="modal-social-box">
								<button class="modal-social--button modal-social--facebook">
									<i class="fab fa-facebook-f"></i>
									Login via Facebook
								</button>
							</div>
							<div class="modal-social-box">
								<button class="modal-social--button modal-social--google">
									<i class="fab fa-google"></i>
									Login by Google
								</button>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('cors_assets/js/jquery.js') }}"></script>
        <script src="{{ asset('cors_assets/js/popper.js') }}"></script>
        <script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>

        <!-- Custom JS -->
        <script src="{{ asset('cors_assets/js/main.js') }}"></script>
        <script>
            $('#register').on('click', function(){
        
                $("#myModal").modal();
            })
            $('#login').on('click', function(){
        
                $("#logModal").modal();
            })
        </script>
	</body>
</html>