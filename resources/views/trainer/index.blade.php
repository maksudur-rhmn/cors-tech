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
											<div>{{ $sale->getUser->name ?? '' }}</div>
											<div>{{ $sale->getCourse->title ?? '' }}</div>
											@if($sale->status == 'pending')
											<div class="red-text">Failed</div>
											@elseif($sale->status == 'paid')
											<div class="green-text">Valid</div>
											@endif
											<div class="sales-money">
												@if($sale->commission == 'no')
												{{ $sale->price }}EUR
												@elseif($sale->commission == 'yes')
												{{ $sale->price - (($sale->price/100) * 15) }}EUR
												@endif
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
										<h3 class="heading-sub">General sales</h3>
										<div class="">
											<h3>Total</h3>
											<h1>{{ $sales->sum('price') }}$</h1>
										</div>
									</div>
									<div class="chart-container">
										<div class="pie-chart-container">
										  <canvas id="pie-charts"></canvas>
										</div>
									  </div>
								</div>
							</div>
							<div class="col-lg-6">
								<!-- Sales chart -->
								<div class="sales-chart-box">
									<div class="sales-header">
										<h3 class="heading-sub">General sales</h3>
										<div class="">
											<h3>Total</h3>
											<h1>{{ $sales->sum('price') }}$</h1>
										</div>
									</div>
									<div class="chart-container">
										<div class="pie-chart-container">
										  <canvas id="pie-chart"></canvas>
										</div>
									  </div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12" id="programme">
								<!-- Sales -->
								<div class="sales bg-main-light">
									<h3 class="heading-sub heading-sub--white">Mes Programmes</h3>

									<div class="sales-table">
										<div class="sales-header">
											<span>Name</span>
											<span>Prog</span>
											<span>Lessons</span>
											<span>Price </span>
										
										</div>
										@forelse ($myProgrammes as $myProgramme)
										<div class="sales-row">
											<div>{{ ucfirst($myProgramme->title) }}</div>
											<div>{{ $myProgramme->getCategory->category_name ?? '' }}</div>
											<div>
												<a href="{{ route('trainerlesson.list', $myProgramme->id) }}" class="btn btn-primary">View Lessons ({{ $myProgramme->getLessons->count() }})  </a>
											</div>
											<div class="sales-money">
												{{ $myProgramme->price }}$
											</div>
										</div>
										@empty
										<h4 class="py-5">
											There is no course.
										</h4>
										@endforelse
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Blue box ends -->

@endsection

@section('footer-script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <!-- javascript -->
   <script>
    $(function(){
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $coaches['chart_data']; ?>`);
        var ctx = $("#pie-charts");
   
        //pie chart data
        var data = {
          labels: cData.label,
          datasets: [
            {
              label: "Trainers",
              data: cData.data,
              backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
              ],
              borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
              ],
              borderWidth: [1, 1, 1, 1, 1,1,1]
            }
          ]
        };
   
        //options
        var options = {
          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "Total Profile Visit",
            fontSize: 18,
            fontColor: "#111"
          },
          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#333",
              fontSize: 16
            }
          }
        };
   
        //create Bar Chart class object
        var chart1 = new Chart(ctx, {
          type: "doughnut",
          data: data,
          options: options
        });
   
    });
  </script>
   <script>
    $(function(){
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
        var ctx = $("#pie-chart");
   
        //pie chart data
        var data = {
          labels: cData.label,
          datasets: [
            {
              label: "Cors Price",
              data: cData.data,
              backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
              ],
              borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
              ],
              borderWidth: [1, 1, 1, 1, 1,1,1]
            }
          ]
        };
   
        //options
        var options = {
          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "Total Cors sold",
            fontSize: 18,
            fontColor: "#111"
          },
          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#333",
              fontSize: 16
            }
          }
        };
   
        //create Bar Chart class object
        var chart1 = new Chart(ctx, {
          type: "bar",
          data: data,
          options: options
        });
   
    });
  </script>
@endsection