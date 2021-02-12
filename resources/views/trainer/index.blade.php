@extends('layouts.trainer-dashboard')

@section('trainer-dash')
	active
@endsection
@section('content')

					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-8">
								<!-- Sales -->
								<div class="sales bg-main-light">
									<h3 class="heading-sub heading-sub--white">Mes sales ({{ $sales->count() }})</h3>

									<div class="sales-table">
										<div class="sales-header">
											<span>Name</span>
											<span>Prog</span>
											<span>Paiment</span>
											<span>Price</span>
										</div>
										@forelse ($sales as $sale)
										<div class="sales-row">
											<div>{{ $sale->getUser->name }}</div>
											<div>{{ $sale->getCourse->title ?? '' }}</div>
											@if($sale->status == 'pending')
											<div class="red-text">Failed</div>
											@elseif($sale->status == 'paid')
											<div class="green-text">Valid</div>
											@endif
											<div class="sales-money">
												{{ $sale->price }}$
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
										@empty
										<h4 class="py-5">
											There is no sale records for your programmes.
										</h4>
										@endforelse
										
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<!-- Incomes -->
								<div class="card-white">
									<div class="card-white-row">
										<h3 class="heading-sub">My Incomes</h3>
										<h1>{{ $sales->sum('price') }}$</h1>
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