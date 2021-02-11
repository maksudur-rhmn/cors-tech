
@extends('layouts.frontend')

  @section('title')
    AKIL - SUBSCRIPTION
  @endsection
  @section('content')
      <div class="section-5">
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
         <h1 data-w-id="343eed66-d95f-88c4-d2a3-b8042eacedcc" style="opacity:1;-webkit-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 40PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="normal_heading center">Get access to <strong class="accent">member-exclusives</strong></h1>
       </div>
       <div class="w-layout-grid section-4">
         <div id="w-node-29632c85da56-28948f59" class="m_container w-container">
           <h2 class="normal_heading">Everything <strong class="accent">You need</strong>.</h2>
           <p class="convincing_txt">Become the real excercising expert with Akil&#x27;s <strong class="accent">special member-exclusive content</strong>. Follow livestreams, see Akil&#x27;s personal news and talk with real professionals on the member Facebook group.</p>
         </div>
         <div id="w-node-bc34b16f8a62-28948f59" class="member-exclusive_right_image"></div>
       </div>
       <div class="section-6">
         <h3 class="normal_heading">And that all for just</h3>
         <div class="member_price"><strong class="accent">€</strong>27,99<strong class="per_month accent">per month</strong></div>
         <h2 class="normal_heading"><strong class="accent">What Are You Waiting For</strong>?</h2>
         <form action="{{ route('subscriptions.store', 'premium') }}" method="POST">
           @csrf
            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
            <button

            style="
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            "

             type="submit" class="try_for_free_button cta w-inline-block">
              <div class="button_bg shadow"></div>
              <div class="text-block get_course" style="color : #000;">subscribe</div>
            </button>
        </form>
         <div class="disclaimer">You can opt-out at any time.<br>By subscribing you agree to our <a href="#" class="link-2">Terms and Conditions</a>.</div>
       </div>

  @endsection
