@extends('layouts.student-dashboard')

@section('home-active')
    active
@endsection

@section('content')
    
<div class="col-lg-9">
    <!-- black main -->
    <main class="black-main bg-dark-light">
        <div class="black-main-header">
            <h3 class="heading-sub heading-sub--white">Pending validation</h3>
        </div>
        @forelse ($sales as $sale)
        <div class="black-main-list">
            <div class="main-list-row">
                <div class="main-list-table">
                    <div class="main-list-header">
                        <span>Name</span>
                        <span>Ratings</span>
                        <span>Reviews</span>
                    </div>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                    <div class="main-list-table-row">
                        <img src="{{ asset('uploads/course') }}/{{ $sale->getCourse->cover_image }}" alt="cover" />
                        <div class="main-list-content">
                            <span>{{ $sale->getCourse->title }}</span>
                             
                            <span>
                                @if(\App\Models\Review::where('user_id', Auth::id())->where('course_id', $sale->getCourse->id)->exists())
                                {{ \App\Models\Review::where('user_id', Auth::id())->where('course_id', $sale->getCourse->id)->first()->stars }} STARS
                                @else
                                <select class="form-control" name="stars">
                                    <option value="">How many stars?</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @endif
                            </span>
                            <span>
                                @if(\App\Models\Review::where('user_id', Auth::id())->where('course_id', $sale->getCourse->id)->exists())
                                {{ \App\Models\Review::where('user_id', Auth::id())->where('course_id', $sale->getCourse->id)->first()->reviews }}
                                @else
                                <textarea class="form-control" name="reviews" placeholder="Your review"></textarea>
                                @endif
                            </span>
                            
                        </div>
                    </div>
                  
                    
                </div>
                <div class="main-list-buttons">
                    <input type="hidden" name="course_id" value="{{ $sale->getCourse->id }}">
                    @if(\App\Models\Review::where('user_id', Auth::id())->where('course_id', $sale->getCourse->id)->exists())
                    <button class="tiny-button tiny-button--green">Review Given</button>
                    @else 
                    <button class="tiny-button tiny-button--green" type="submit">Submit</button>
                    @endif
                </form>
                </div>
            </div>
        </div>

        @empty
        <h5 class="text-center">
            No course bought yet.
        </h5>
    @endforelse
    </main>
</div>
</div>
</div>
</main>
@endsection