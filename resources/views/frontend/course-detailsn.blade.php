@extends('layouts.frontend')

@section('title')
	CORS TECH | {{ ucfirst($course->title) }}
@endsection


@section('custom-js')
<script>
    $('#buy').on('click', function(){
         $("#buyNow").modal();
    })
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

<!-- Modal -->
		<div
			class="modal fade"
			id="buyNow"
			tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog--large modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="color-main">My Cart</h1>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-8">
									<h3 class="heading-sub m-0">Description</h3>
									<div class="row">
										<div class="col-lg-6">
											<div class="modal-box">
												<figure><img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="image" /></figure>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="modal-box">
												<h1 class="color-main">{{ $course->title }}</h1>
												<p class="color-main">
													{{ $course->short_description }}
												</p>
												<p class="color-main">
													{{ $course->description }}
												</p>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="modal-box">
												<h3 class="heading-sub">Our Application</h3>
												<button class="button button--outline-main-empty mb-3">
													<i class="fab fa-app-store-ios mr-2"></i>
													<span class="font-weight-normal">Available on</span> App Store
												</button>
												<button class="button button--outline-main-empty">
													<i class="fab fa-google-play mr-2"></i>
													<span class="font-weight-normal">Available on</span> Play Store
												</button>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="modal-box">
												<h3 class="heading-sub">Offer it</h3>
												<button class="button button--outline-main-empty mb-3">
													Give to a friend
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="">
										<h3 class="heading-sub text-right">Payment</h3>
										<div class="modal-payment">
											<div class="modal-payment-content">
												{{-- <h3 class="heading-sub">Points Cors</h3>
												<p>155 Cors experience points reported for this training.</p> --}}
												<h3 class="heading-sub">Payment method</h3>
												<i class="fab fa-cc-paypal"></i>
												<i class="fab fa-cc-mastercard"></i>
											</div>
											<div class="modal-payment-footer">
												<h3 class="heading-sub">Total</h3>
												<div class="d-flex justify-content-between align-items-center">
                                                    @auth
                                                    @if(!$isBought)
                                                    <form  action="{{ route('mollie.payment') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="price" value="{{ $course->price }}.00">
                                                        <input type="hidden" name="coursename" value="{{ $course->title }}">
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <input type="hidden" name="trainer_id" value="{{ $course->getUser->id }}">
													    <button type="submit" class="button button--white">Pay</button>
                                                    </form>
													<h1>{{ $course->price }}$</h1>
                                                    @else 
                                                    <button type="submit" class="button button--white">Your course</button>
                                                    @endif
                                                    @endauth
													@guest
													<form  action="{{ route('mollie.payment') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="price" value="{{ $course->price }}.00">
                                                        <input type="hidden" name="coursename" value="{{ $course->title }}">
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <input type="hidden" name="trainer_id" value="{{ $course->getUser->id }}">
													    <button type="submit" class="button button--white">Pay</button>
                                                    </form>
													<h1>{{ $course->price }}$</h1>
													@endguest
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div> -->
				</div>
			</div>
		</div>
		<main class="main">
            @if($errors->all())

            <div class="alert alert-danger">
               @foreach ($errors->all() as $error)
               <h2 class="course_small_description" style="color:red;">
                    {{ $error }}
               </h2>
               @endforeach
            </div>
            @endif

			<div class="container">
				<h1 class="heading-sm heading-sm--main">{{ ucfirst($course->title) }}</h1>
				<h3 class="heading-sub">Explicative video</h3>

				<div class="row">
					<div class="col-lg-8">
						<!-- primary -->
						<div class="primary-box">
							<!-- cover -->
							<div class="primary-cover">
								<video width="100%" controls>
                                    <source src="{{ asset('uploads/intro-videos') }}/{{ $course->introduction_video }}" type="video/mp4">
                                  Your browser does not support the video tag.
                                  </video>
							</div>

							<!-- description -->
							<div class="primary-desc">
								<h3 class="heading-sub">Description</h3>
								<p>
									{{ $course->short_description }}
								</p>
                                <p>
                                    {{ $course->description }}
                                </p>
							</div>

							<!-- programs -->
							<div class="primary-programs">
								<h3 class="heading-sub">Pictures of program</h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="primary-cover">
											<img src="{{ asset('uploads/course') }}/{{ $course->cover_image }}" alt="cover" />
										</div>
									</div>
								</div>
							</div>

							<!-- session -->
							<div class="primary-session">
								<div class="primary-session-header">
									<h3 class="heading-sub">Session</h3>
								</div>
								<div class="primary-session-list-box">
									<ul class="primary-session-list">
										<li class="session-list session-list-head">
											<span>Name</span>
											<span>Goal</span>
											<span>Course Length</span>
											<span>Lesson Number</span>
											<span>Price</span>
										</li>
										<li class="session-list session-list-regular">
											<span>Session 1</span>
											<span
												>{{ $course->title }}</span
											>
											<span>{{ $course->course_length }}</span>
											<span>01</span>
											<span>{{ $course->price }}</span>
										</li>

                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($course->getLessons as $lesson)
                                        <li class="session-list session-list-regular">
                                                <span>Session {{ $lesson->serial + 1 }}</span>
											<span
												> {{ $lesson->lesson_title }}</span
											>
											<span>{{ $course->course_length }}</span>
											<span>
                                                @if($lesson->serial < 10)
                                                0{{ $lesson->serial + 1 }}
                                                @else 
                                                {{ $lesson->serial + 1 }}
                                                @endif
                                            </span>
											<span>--</span>
										</li>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
									</ul>
								</div>
							</div>

							<!-- chart -->
							{{-- <div class="primary-chart">
								<h3 class="heading-sub">Weeks</h3>

								<div class="chart-box">
									<div id="chartContainer" style="height: 300px; width: 100%"></div>
								</div>
							</div> --}}

							<!-- team -->
							{{-- <div class="primary-team">
								<h3 class="heading-sub">CO-TEAMS WITH THIS COMMON PROGRAM</h3>

								<div class="row">
									<div class="col-lg-6">
										<div class="team-box">
											<div class="team-avatar">
												<img src="img/profile-rounded.jpg" alt="cover" />
												<div class="team-title">
													<h3>David Lee</h3>
													<p>Paris - <span>20 ANS</span></p>
												</div>
												<div class="team-cta">
													<a href="#" class="button button--outline-white-empty">
														<i class="far fa-paper-plane"></i>
													</a>
												</div>
											</div>
											<div class="team-desc">
												<div class="team-row">
													<p>Sports pratiques</p>
													<span>15 Amis</span>
												</div>
												<div class="team-row">
													<p>Football - Muscu - Tennis - Running</p>
													<p>Dans la salle 17 avenue des fleurs</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="team-box">
											<div class="team-avatar">
												<img src="img/profile-rounded.jpg" alt="cover" />
												<div class="team-title">
													<h3>David Lee</h3>
													<p>Paris - <span>20 ANS</span></p>
												</div>
												<div class="team-cta">
													<a href="#" class="button button--outline-white-empty">
														<i class="far fa-paper-plane"></i>
													</a>
												</div>
											</div>
											<div class="team-desc">
												<div class="team-row">
													<p>Sports pratiques</p>
													<span>15 Amis</span>
												</div>
												<div class="team-row">
													<p>Football - Muscu - Tennis - Running</p>
													<p>Dans la salle 17 avenue des fleurs</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}

							<!-- rating -->
							<div class="primary-rating">
								<h3 class="heading-sub">Notes and advice</h3>
								<div class="rating-row">
									<div class="rating-num">
										<h1>5.5</h1>
										<p>Current note</p>
									</div>
									<div class="rating-percentage">
										<div class="percentage-row">
											<span>10</span>
											<div class="rating-bar">
												<div class="rating-overlay rating-overlay--100"></div>
											</div>
											<div class="rating-stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>
												<i class="far fa-star"></i>
											</div>
										</div>
										<div class="percentage-row">
											<span>7</span>
											<div class="rating-bar">
												<div class="rating-overlay rating-overlay--75"></div>
											</div>
											<div class="rating-stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>
											</div>
										</div>
										<div class="percentage-row">
											<span>4</span>
											<div class="rating-bar">
												<div class="rating-overlay rating-overlay--50"></div>
											</div>
											<div class="rating-stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
										</div>
										<div class="percentage-row">
											<span>1</span>
											<div class="rating-bar">
												<div class="rating-overlay rating-overlay--25"></div>
											</div>
											<div class="rating-stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
										</div>
										<div class="percentage-row">
											<span>2</span>
											<div class="rating-bar">
												<div class="rating overlay rating-overlay--0"></div>
											</div>
											<div class="rating-stars">
												<i class="fas fa-star"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- comment -->
							<div class="primary-comment">
								<div class="comment">
									<div class="comment-avatar">
										<img src="{{ asset('cors_assets/img/comment-profile.jpg') }}" alt="cover" />
									</div>
									<div class="comment-desc">
										<div class="comment-header">
											<h3>Anna Clark</h3>
											<a href="#">Report</a>
										</div>
										<div class="comment-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</div>
										<div class="comment-explain">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent efficitur
												finibus eros, in luctus urna tempus at. Sed placerat ex non purus auctor
												faucibus. Vestibulum mollis pharetra est sed facilisis. Fusce ultrices nibh
												lacinia massa dictum, sit amet aliquet tellus volutpat. Nam dictum enim ut
												pharetra eleifend. Phasellus eget nisi tincidunt, mattis odio at, mollis
												turpis.
											</p>
										</div>
									</div>
								</div>
							</div>

							<!-- bottom grid -->
							<section class="grid grid--two">
								<div class="row">
									@forelse(App\Models\Course::latest()->get()->take(3) as $cour)
                                    <div class="col-lg-4">
										<div class="grid-box">
											<img src="{{ asset('uploads/course/') }}/{{ $cour->cover_image }}" alt="" />
											<div class="grid-banner">
												<img src="{{ $cour->getUser->profile_photo_url }}" class="grid-banner-avatar" alt="" />
												<div class="grid-banner-content">
													<span>Par</span>
													<p>{{ $cour->getUser->name }}</p>
												</div>
											</div>
											<div class="grid-footer-box">
												<div class="grid-footer-side">
													<h3>Exercise dos</h3>
													<div class="grid-footer-row">
														<p>{{ $cour->getLessons->count() }} seances</p>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    @empty
                                        
                                    @endforelse
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-4">
						<!-- sidebar -->
						<aside class="primary-sidebar">
							<!-- sidebar profile -->
							<div class="primary-profile">
								<div class="profile-row">
									<div class="profile-avatar">
										<img src="{{ $course->getUser->profile_photo_url }}" alt="image" />
									</div>
									<div class="profile-desc">
										<span>Realized By</span>
										<h3>{{ $course->getUser->name }}</h3>
										<div class="profile-buttons-row">
											<div class="profile-buttons">
												<a href="{{ route('front.coachProfile', $course->user_id) }}" class="profile-button"> {{ $course->getUser->getCourse->count() }} </a>
												<span>Programmes</span>
											</div>
											<div class="profile-buttons">
												<a href="#" class="profile-button">
													<img src="{{ asset('cors_assets/img/icons/flag-icon.png') }}" alt="image" />
												</a>
												<span>Pays</span>
											</div>
										</div>
									</div>
								</div>
								<div class="profile-row">
									<div class="profile-links">
										<div class="profile-link">
											<a href="#"><i class="fas fa-link"></i> {{ $course->getUser->name }} </a>
										</div>
										<div class="profile-link">
											<a href="#"><i class="fab fa-instagram"></i> {{ $course->getUser->getProfile->instagram ?? 'Not available' }}</a>
										</div>
									</div>
									<div class="profile-cta">
										<a href="{{ route('front.coachProfile', $course->user_id) }}" class="button button--outline-white-empty">See profile</a>
									</div>
								</div>
							</div>

							<!-- sidebar favors -->
							{{-- <div class="primary-favors">
								<div class="favors-header">
									<h3>Favoris</h3>
									<a href="#">See All</a>
								</div>
								<a href="#" class="button button--outline-primary">Add to favorites</a>
							</div> --}}

							<!-- sidebar playlist -->
							<div class="primary-playlist">
								<div class="playlist-desc">
									<h3>Playlist Spotify</h3>
									<h3>Ultimate motivation #1</h3>
									<span>You can play your own playlist</span>
								</div>

								<div class="playlist-icon">
									<a href="#">
										<img src="{{ asset('cors_assets/img/icons/spotify-icon.png') }}" alt="icon" />
									</a>
								</div>
							</div>

							<!-- sidebar general -->
							<div class="primary-general">
								<h3>General Info</h3>

								<ul class="general-list">
									<li>
										<a href="#">Number of sessions<span>{{ $course->getLessons->count() }}</span> </a>
									</li>
									<li>
										<a href="#">Program language <span>FR, EN</span></a>
									</li>

									<li>
										<a href="#"
											>Note : 5/5
											<div>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i></div
										></a>
									</li>
									<li>
										<a href="#">Participants <span>{{ App\Models\Sale::where('course_id', $course->id)->get()->count() }}</span></a>
									</li>
									<li>
										<a href="#">Free sessions <span>1</span> </a>
									</li>
								</ul>

								<div class="primary-general-footer">
									<div class="general-desc">
										<h3>{{ $course->price }}$</h3>
										<span>Paiement mensuel disponible</span>
									</div>
									<div class="general-cta">
										@if($isBought)
                                        <a href="#" class="button button--fill">Your course</a>
                                        @else 
                                        <a id="buy" href="#" class="button button--fill">Buy Now</a>
                                        @endif
									</div>
								</div>
							</div>

							<!-- sidebar technical -->
							 {{-- <div class="primary-technical">
								<h3>Technical details</h3>
								<ul>
									<li>
										<p>Type of practice</p>
										<span>120</span>
									</li>
									<li>
										<p>Muscle goal</p>
										<span>120</span>
									</li>
									<li>
										<p>Training method</p>
										<span>120</span>
									</li>
									<li>
										<p>Exercise / Tactics</p>
										<span>120</span>
									</li>
									<li>
										<p>Objective gr. muscular</p>
										<span>120</span>
									</li>
									<li>
										<p>Technical objective</p>
										<span>120</span>
									</li>
									<li>
										<p>Motivations</p>
										<span>120</span>
									</li>
									<li>
										<p>Gender</p>
										<span>120</span>
									</li>
									<li>
										<p>Age</p>
										<span>120</span>
									</li>
									<li>
										<p>Duration</p>
										<span>120</span>
									</li>
									<li>
										<p>Level</p>
										<span>120</span>
									</li>
									<li>
										<p>Physical state</p>
										<span>120</span>
									</li>
								</ul>
							</div>  --}}

							<!-- sidebar problem -->
							<div class="primary-problem">
								<h3>A problem ?</h3>
								<a href="{{ route('front.contact') }}">Contact us or report</a>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</main>

@endsection