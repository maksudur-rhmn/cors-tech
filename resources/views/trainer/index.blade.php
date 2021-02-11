@extends('layouts.trainer-dashboard')

@section('content')
    
		<!-- Blue box start -->
		<main class="blue-box mb-5">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3">
						<div class="blue-sidebar">
							<!-- Shortcuts -->
							<div class="side-list-box bg-main-light">
								<h3 class="heading-sub heading-sub--white">Shortcuts</h3>

								<ul class="side-list">
									<li><a href="#" class="active">Activity</a></li>
									<li><a href="#">Validation pending</a></li>
									<li><a href="#">Payments</a></li>
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
								<div class="program-content">
									@if(Auth::user()->subscribed('Premium Membership'))
                                    <a href="#" class="button button--outline-white-empty">Sports program</a>
									<a href="#" class="button button--outline-white-empty">Event</a>
									<a href="#" class="button button--outline-white-empty">Diet program</a>
									<a href="#" class="button button--outline-white-empty">Article</a>
									<a href="#" class="button button--outline-white-empty">Simple exercise</a>
									<a href="#" class="button button--outline-white-empty">Training</a>
									<a href="#" class="button button--outline-white-empty">Course</a>
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
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-8">
								<!-- Sales -->
								<div class="sales bg-main-light">
									<h3 class="heading-sub heading-sub--white">Mes sales (7)</h3>

									<div class="sales-table">
										<div class="sales-header">
											<span>Name</span>
											<span>Prog</span>
											<span>Paiment</span>
											<span>Price</span>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="green-text">Valid</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="red-text">Failed</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="red-text">Failed</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="red-text">Failed</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="red-text">Failed</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="green-text">Valid</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
										<div class="sales-row">
											<div>Yonthan E.</div>
											<div>Muscu 2</div>
											<div class="green-text">Valid</div>
											<div class="sales-money">
												120$
												<a
													href="#"
													class="my-tooltip"
													data-toggle="tooltip"
													data-placement="top"
													title="Achat complet
                                                    Sans réduction"
													><i class="fas fa-info-circle"></i
												></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<!-- Incomes -->
								<div class="card-white">
									<div class="card-white-row">
										<h3 class="heading-sub">My Incomes</h3>
										<h1>9 225$</h1>
									</div>

									<div class="card-white-row">
										<h3 class="heading-sub">My Incomes</h3>
										<a href="#" class="button button--outline-primary">Make the transfer</a>
									</div>

									<div class="card-white-row">
										<h3 class="heading-sub">My Incomes</h3>
										<a href="#" class="button button--outline-primary"
											><i class="fab fa-paypal"></i> Paypal</a
										>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<!-- Sales chart -->
								<div class="sales-chart-box">
									<div class="sales-header">
										<h3 class="heading-sub">Evolution of sales</h3>
										<div class="">
											<h3>Total</h3>
											<h1>9 225€</h1>
										</div>
									</div>
									<div class="sales-chart"></div>
								</div>
							</div>
							<div class="col-lg-6">
								<!-- Profile chart -->
								<div class="profile-visit-chart-box">
									<div class="profile-header">
										<h3 class="heading-sub">Profile visits</h3>
										<div class="">
											<h3>Total</h3>
											<h1>9 225€</h1>
										</div>
									</div>
									<div class="profile-visit-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Blue box ends -->

@endsection