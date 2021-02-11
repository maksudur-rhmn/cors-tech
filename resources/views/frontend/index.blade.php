@extends('layouts.frontend')

@section('title')
Akil - Home
@endsection

@section('content')
<div class="section">
  @if(session('success'))

    <div class="alert alert-success">
       <h2 class="course_small_description" style="color:green; padding-bottom:10px;">
            {{ session('success') }}
       </h2>
    </div>

  @endif
    <div class="m_container w-container">
      <div class="w-layout-grid overlay_grid">
        <div id="w-node-bcf2b5fb47b7-2119c14a" class="main_head_holder">
          <h1 data-w-id="9d9fbdb4-88aa-7f2b-ad36-18680e627f9f"  class="main_head mob">gain <br>maximum <strong class="bold-text">body controL</strong><strong class="bold-text-2">.</strong></h1>
          <h1 data-w-id="e2a6bce1-0659-8812-12f5-cea523f7c326" class="main_head">gain <br>maximum <strong class="bold-text">body control</strong>.</h1>
        </div>
        <a id="w-node-e59d4e69475c-2119c14a" data-w-id="3ddbf5e5-d433-c63f-fcef-e59d4e69475c" href="
          @auth
          {{ route('front.courses') }}
          @else
          {{ route('register') }}
          @endauth
        " class="try_for_free_button w-inline-block">
          <div class="button_bg shadow"></div>
          <div class="text-block">Try For Free</div>
        </a>
      </div>
    </div>
    <div class="tran_vid_overlay"></div>
    <div class="html-embed w-embed w-iframe"><iframe width="110%" height="110%" src="https://www.youtube-nocookie.com/embed/pDUwVPgyAsI?controls=0&autoplay=1&loop=1&mute=1&playlist=pDUwVPgyAsI" allowfullscreen=""></iframe></div>
  </div>
@endsection
