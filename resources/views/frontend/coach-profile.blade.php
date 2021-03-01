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
		<title>CORS TECH | {{ ucfirst($data->name ?? '') }}</title>
        {{-- <style>
			.goog-te-banner-frame.skiptranslate {display: none!important;} 
            body {top: 0px!important;}
		</style> --}}
	</head>
	<body>
		<!-- header background cover -->
		<section class="bg-cover" style="background-image: linear-gradient(to bottom, black, transparent), url({{ asset('uploads/trainers/cover') }}/{{ $data->cover_picture ?? '' }});">
			<!-- Navbar Start -->
			<nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/become/an/instructor') }}">Become an Instructor</a>
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

			<!-- main starts -->
			<main class="main main-profile">
				<div class="back-profile">
					<a href="{{ url()->previous() }}" class="back-button"> <i class="fas fa-chevron-left"></i></a>
				</div>

				<div class="profile-wrapper profile-wrapper--2">
					<h1 class="heading heading--white">{{ ucfirst($data->name ?? '') }}</h1>
					<h3 class="color-white">Verified Coach</h3>
					<div class="badge-row">
						<div class="badge-box">
							<h1>{{ $coach->getCourse->count() }}</h1>
							<p>Programs</p>
						</div>
						<div class="badge-box">
							<h1>4.9</h1>
							<p>Note clients</p>
						</div>
						<div class="badge-box">
							<h1>{{ $coach->getSale->count() }}</h1>
							<p>Students</p>
						</div>
						<div class="badge-box">
							<h1>{{ $coach->getSale->count() }}</h1>
							<p>Sale</p>
						</div>
					</div>

					{{-- <div class="profile-button-box">
						<a href="#" class="button button--outline-white-empty">
							<i class="far fa-paper-plane mr-2"></i> Envoyer un message
						</a>
					</div> --}}
				</div>
			</main>
			<!-- main ends -->
		</section>

		<!-- rounded profile -->
		<section class="profile-rounded">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="profile-rounded-box">
							<img src="{{ $coach->profile_photo_url }}" alt="" />
							<div class="profile-rounded-name">
								<span> {{ ucfirst($coach->name) }} </span>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="profile-tab">
							<ul>
								<li class="active"><a>Informations</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- about -->
		<section class="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="about-qualification">
							<h1 class="heading-sm heading--main">Qualifications</h1>
							<div class="about-awards">
								<div class="about-award">
									<img src="{{ asset('cors_assets/img/icons/award.png') }}" alt="" />
									<h3>{{ $data->qualification_one ?? '' }}</h3>
								</div>
								<div class="about-award">
									<img src="{{ asset('cors_assets/img/icons/award.png') }}" alt="" />
									<h3>{{ $data->qualification_two ?? '' }}</h3>
								</div>
								<div class="about-award">
									<img src="{{ asset('cors_assets/img/icons/award.png') }}" alt="" />
									<h3>{{ $data->qualification_three ?? '' }}</h3>
								</div>
								<div class="about-award">
									<img src="{{ asset('cors_assets/img/icons/award.png') }}" alt="" />
									<h3>{{ $data->qualification_four ?? '' }}</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="about-who-box">
							<h1 class="heading-sm heading--main text-right">Who I am ?</h1>
							<div class="about-who">
								<img src="
                                    @isset($data)
                                    {{ asset('uploads/trainers/whoiam') }}/{{ $data->who_i_am_picture }}
                                    @else
                                    {{ asset('cors_assets/img/card-bg.jpg') }} 
                                    @endisset
                                " alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- words -->
		<section class="words">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<h1 class="heading-sm heading--main">In a few words</h1>
						<p>
							{{ $data->who_i_am ?? 'No information available' }}
						</p>
					</div>
					<div class="col-lg-5">
						<h1 class="heading-sm heading--main text-right">Useful links</h1>
						<div class="profile-links profile-links--2">
							<div class="profile-link-wrapper">
								<div class="profile-link">
									{{-- <button class="button button--fill">Envoyer un message</button> --}}
								</div>
								<div class="profile-link">
									<p>INSTAGRAM</p>
									<span>{{ $data->instagram ?? 'Not available' }}</span>
								</div>
								<div class="profile-link">
									<p>SITE WEB</p>
									<span>{{ $data->website ?? 'Not available' }}</span>
								</div>
							</div>
						</div>
						<h1 class="heading-sm heading--main text-right">A problem ?</h1>
						<p class="words-underline">
                             <a href="{{ route('front.contact') }}">Contact us or report this profile</a>
                        </p>
					</div>
				</div>
			</div>
		</section>

		<!-- programs -->
		<section class="programs">
			<div class="container">
				<div class="programs-header">
					<h1 class="heading-sm heading--main">Programs</h1>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a
								class="nav-link active"
								id="athletic-tab"
								data-toggle="tab"
								href="#athletic"
								role="tab"
								aria-controls="athletic"
								aria-selected="false"
								>All Programs by the coach</a
							>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="myTabContent">
					
					<div
						class="tab-pane fade show active"
						id="athletic"
						role="tabpanel"
						aria-labelledby="athletic-tab"
					>
						<!-- athletic tab -->
						<div class="grid grid--two">
							<div class="row">
                                @forelse ($coach->getCourse as $course)
                                <div class="col-lg-3">
                                    <a href="{{ route('front.details', $course->slug) }}">
									<div class="grid-box">
										<img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="" />
										<div class="grid-banner">
											<img src="{{ $coach->profile_photo_url }}" class="grid-banner-avatar" alt="" />
											<div class="grid-banner-content">
												<span>Par</span>
												<p>{{ ucfirst($coach->name) }}</p>
											</div>
										</div>
										<div class="grid-footer-box">
											<div class="grid-footer-side">
												<h3>Exercise dos</h3>
												<div class="grid-footer-row">
													<p>{{ $course->course_length }}</p>
												</div>
											</div>
											<div class="grid-footer-amount">{{ $course->price }}$</div>
										</div>
									</div>
                                    </a>
								</div>
                                @empty
                                    <p>No Programs Available.</p>
                                @endforelse
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

        <footer class="footer">
            <div class="footer-row">
                <div class="footer-col">
                    <ul class="footer-list">
                        <li><a href="{{ route('front.instructor') }}">Become a trainer</a></li>
                        <li><a href="#">Download application</a></li>
                        <li><a href="{{ route('front.about') }}">About us</a></li>
                        <li><a href="{{ route('front.contact') }}">Contact-us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul class="footer-list">
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help and support</a></li>
                        <li><a href="#">Affiliation</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul class="footer-list">
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Confidentiality / Cookies</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Showing courses</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul class="footer-list">
                        <li><a href="#">Language</a></li>
                    </ul>
                    <ul class="footer-language">
                        <li><a href="#googtrans(en|fr)" class="lang-fr lang-select" data-lang="fr">FR</a></li>
                        <li><a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en">ENGLISH</a></li>
                        <li><a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es">ES</a></li>
                        <li><a href="#googtrans(en|de)" class="lang-es lang-select" data-lang="de">DE</a></li>
                    </ul>
                </div>
            </div>
            <p class="footer-copyright">Cors Tech - <script>document.write(new Date().getFullYear())</script> Copyright</p>
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
                           <div class="modal-social-box">
                              <a href="{{ url('/auth/facebook') }}">
                                  <button style="outline: none;" class="modal-social--button modal-social--facebook">
                                      <i class="fab fa-facebook-f"></i>
                                      Login via Facebook
                                  </button>
                              </a>
                          </div>
                          <div class="modal-social-box">
                              <a href="{{ url('auth/google') }}">
                              <button style="outline:none;" class="modal-social--button modal-social--google">
                                  <i class="fab fa-google"></i>
                                  Login by Google
                              </button>
                          </a>
                          </div> 
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
                                  <div class="modal-social">
                                      <div class="modal-social-box">
                                          <a href="{{ url('/auth/facebook') }}">
                                          <button style="outline:none;" class="modal-social--button modal-social--facebook">
                                              <i class="fab fa-facebook-f"></i>
                                              Login via Facebook
                                          </button>
                                      </a>
                                      </div>
                                      <div class="modal-social-box">
                                          <a href="{{ url('auth/google') }}">
                                          <button style="outline: none;" class="modal-social--button modal-social--google">
                                              <i class="fab fa-google"></i>
                                              Login by Google
                                          </button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
          
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="{{ asset('cors_assets/js/jquery.js') }}"></script>
          <script src="{{ asset('cors_assets/js/popper.js') }}"></script>
          <script src="{{ asset('cors_assets/js/bootstrap.min.js') }}"></script>
          
          <!-- Custom JS -->
          <script src="{{ asset('cors_assets/js/main.js') }}"></script>
          <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
            }
        
            function triggerHtmlEvent(element, eventName) {
              var event;
              if (document.createEvent) {
                event = document.createEvent('HTMLEvents');
                event.initEvent(eventName, true, true);
                element.dispatchEvent(event);
              } else {
                event = document.createEventObject();
                event.eventType = eventName;
                element.fireEvent('on' + event.eventType, event);
              }
            }
        
            jQuery('.lang-select').click(function() {
              var theLang = jQuery(this).attr('data-lang');
              jQuery('.goog-te-combo').val(theLang);
        
              //alert(jQuery(this).attr('href'));
              window.location = jQuery(this).attr('href');
              location.reload();
        
            });
          </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script>
            $('#register').on('click', function(){
        
                $("#myModal").modal();
            })
            $('#login').on('click', function(){
        
                $("#logModal").modal();
            })
        </script>
          @yield('custom-js')
          </body>
          </html>
