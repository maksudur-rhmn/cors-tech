@extends('layouts.student-dashboard')

@section('history-active')
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
                        <span>Price</span>
                        <span>Status</span>
                        <span>Bought at</span>
                    </div>
                   
                    <div class="main-list-table-row" style="background-color: #fff !important">
                        <img src="{{ asset('uploads/course') }}/{{ $sale->getCourse->cover_image }}" alt="cover" />
                        <div class="main-list-content">
                            <span>{{ $sale->getCourse->title }}</span>
                            <span>{{ $sale->price }}$</span>
                            <span>
                                @if($sale->status == 'pending')
                                Payment Failed
                                @elseif($sale->status == 'paid')
                                Payment Successful
                                @endif
                            </span>
                            <span>{{ $sale->created_at->format('d M Y') }}</span>
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
            No payment history yet.
        </h5>
    @endforelse

    </main>
</div>
</div>
</div>
</main>
@endsection