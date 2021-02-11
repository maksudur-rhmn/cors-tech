
@extends('layouts.frontend')

  @section('title')
    AKIL - EXCLUSIVE MEMBER AREA
  @endsection


  @section('content')
    <div class="section-3">
        @if(session('success'))

          <div id="w-node-29632c85da56-28948f59" class="m_container w-container">
             <h1 data-w-id="343eed66-d95f-88c4-d2a3-b8042eacedcc" style="opacity:1; color: red; -webkit-transform:translate3d(0, 40PX, 0); scale3d(1, 1, 1); rotateX(0); rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="normal_heading center"> <strong class="accent" style="color: green;"> {{ session('success') }} </strong>
              </h1>
          </div>

        @endif
        @if(session('danger'))

          <div id="w-node-29632c85da56-28948f59" class="m_container w-container">
             <h1 data-w-id="343eed66-d95f-88c4-d2a3-b8042eacedcc" style="opacity:1; color: red; -webkit-transform:translate3d(0, 40PX, 0); scale3d(1, 1, 1); rotateX(0); rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="normal_heading center"> <strong class="accent"> {{ session('danger') }} </strong>
              </h1>
          </div>

        @endif
  <div class="m_container w-container">
    <h1 class="normal_title">Your <strong class="accent">member</strong> area.</h1>
    <p class="paragraph-2">Welcome to your member area! <br>You have access to exclusive member courses, latest news and the Facebook group from Akil. The member courses are in your courses library - the &#x27;Owned Courses&#x27; tab. Good luck with excercising!</p>
    <h3 class="normal_heading"><strong class="accent">EXCLUSIVE</strong> NEWS.</h3>
    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
      <div class="w-slider-mask">
         @forelse ($articles as $article)
           <div class="message_container w-slide">
             <div class="news_message">
               <h4 class="normal_heading">{{ $article->title }}</h4>
               <p>{{ $article->article }}</p>
             </div>
           </div>
         @empty
           <h3 class="normal_heading">No news available at the moment. Please try again later. Thank you</h3>
         @endforelse
      </div>
      <div class="small_button nav_butn w-slider-arrow-left">
        <div class="text-block-4">&lt;</div>
      </div>
      <div class="small_button nav_butn w-slider-arrow-right">
        <div class="text-block-4">&gt;</div>
      </div>
      <div class="slide-nav w-slider-nav w-round"></div>
    </div>
  </div>
  <div class="cta_bar differentbg">
    <h1 class="normal_title cta">join the <strong class="accent">member facebook group</strong>.</h1>
    <a href="https://{{ $facebook_group->facebook_group }}" target="_blank" class="try_for_free_button cta w-inline-block">
      <div class="button_bg shadow"></div>
      <div class="text-block get_course">join facebook group</div>
    </a>
  </div>
</div>

  @endsection
