@extends('layouts.student-dashboard')

@section('home-active')
    active
@endsection

@section('content')
    
<div class="col-lg-9">
    <!-- black main -->
    <main class="black-main">
        <div class="black-main-header">
            <h3 class="heading-sub heading-sub--white">Pending validation</h3>
        </div>
        @forelse ($sales as $sale)
        <div class="black-main-list">
            <div class="main-list-row">
                <div class="main-list-table">
                    <div class="main-list-header">
                        <span>Name</span>
                        <span>Description</span>
                        <span>Genre</span>
                        <span>Programme</span>
                    </div>
                   
                    <div class="main-list-table-row" style="background-color:#fff !important; ">
                        <img src="{{ asset('uploads/course') }}/{{ $sale->getCourse->cover_image }}" alt="cover" />
                        <div class="main-list-content">
                            <span>{{ $sale->getCourse->title }}</span>
                            <span>{{ $sale->getCourse->short_description }}</span>
                            <span>{{ $sale->getCourse->getSubCategory->name }}</span>
                            <span>{{ $sale->getCourse->getCategory->category_name }}</span>
                        </div>
                    </div>
                  
                    
                </div>
                <div class="main-list-buttons">
                    @if($sale->status == 'paid')
                    <a href="{{ route('my.course', $sale->course_id) }}" class="tiny-button tiny-button--green">Access Cors</a>
                    @else
                    <a class="tiny-button tiny-button--red">Cors Access Rejected</a>
                    @endif
                </div>
            </div>
        </div>

        @empty
        <h5 class="text-center">
            No course bought yet.
        </h5>
    @endforelse
    
        <div class="black-main-footer">
           @if($sales->hasPages())
            <a href="{{ $sales->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
            <a href="#">Page {{ request()->page ?? 1 }} of {{ $sales->lastPage() }}</a>
            <a href="{{ $sales->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
           @else 
            <a href="#">Page {{ request()->page ?? 1 }} of {{ $sales->lastPage() }}</a>
           @endif
        </div>
    </main>

   {{-- <div class="row">
        <div class="col-lg-6">
            <div class="news-chart-box">
                <h3 class="heading-sub">General Informations</h3>
                <div class="news-header">
                  <div class="">
                      <h3>New Coaches</h3>
                      <h1 class="color-chart font-weight-bold">{{ trainers()->count() }}</h1>
                  </div>
                  <div class="">
                      <h3>Corse Bought</h3>
                      <h1 class="font-weight-bold">{{ $sales->count() }}</h1>
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
            <div class="sellers">
                <div class="sellers-header">
                    <h3 class="heading-sub heading-sub--white">Your Trainers</h3>
                    <a href="{{ url('/') }}">See All</a>
                </div>
                <div class="sellers-row">
                    @forelse($sales->take(3) as $value)
                    <div class="seller">
                        <a href="{{ route('front.coachProfile', $value->getCourse->getUser->id) }}"><img src="{{ $value->getCourse->getUser->profile_photo_url }}" alt="cover" /></a>
                        <h3>{{ ucfirst($value->getCourse->getUser->name) }}</h3>
                        <span>Course Fee</span>
                        <div class="seller-footer">
                            <h3>{{ $value->price }}$</h3>

                            <a
                                href="#"
                                class="my-tooltip"
                                data-toggle="tooltip"
                                data-placement="top"
                                title=""
                                data-original-title="Total spent on course"
                                ><i class="fas fa-circle"></i
                            ></a>
                        </div>
                    </div>
                    @empty
                        <h4 class="text-center">No trainers found.</h4>
                    @endforelse
                    
                    <div class="seller-navigation">
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
          <!-- Total customers -->
          <div class="card-white card-white--1">
              <div class="card-white-row">
                  <h3 class="heading-sub">TOTAL SPENT</h3>
                  <h1>{{ $sales->sum('price') }}$</h1>
              </div>

              <div class="card-white-row">
                  <h3 class="heading-sub">TOTAL CORS BOUGHT</h3>
                  <h1>{{ $sales->count() }}</h1>
              </div>

              <div class="card-white-row">
                  <h3 class="heading-sub">FAILED PAIEMENTS</h3>
                  <div class="warning-row">
                      <h1 class="dark-red-text">{{ failedPayments(Auth::id())->count() }}</h1>
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
    </div> --}}
</div>
</div>
</div>
</main>
@endsection

@section('footer-js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <!-- javascript -->
 
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
            text: "Total Cors bought",
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
            text: "Total Trainers",
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
          type: "pie",
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
            text: "Total Cors bought",
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