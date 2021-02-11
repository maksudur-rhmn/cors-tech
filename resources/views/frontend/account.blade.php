{{--
<!DOCTYPE html>
<!--  Last Published: Sun Sep 27 2020 13:18:31 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5f708b6674a4afa3bf27b789" data-wf-site="5f62723428a4c86ad749af09">
<head>
  <meta charset="utf-8">
  <title>Account</title>
  <meta content="Account" property="og:title">
  <meta content="Account" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <link href="{{ asset('frontend_assets/css/normalize.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('frontend_assets/css/components.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('frontend_assets/css/akil-courses.css') }}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="{{ asset('frontend_assets/images/favicon.png') }}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('frontend_assets/images/webclip.png') }}" rel="apple-touch-icon">
</head>
<body class="body-2">
  <div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
    <div class="m_container w-container"><a href="#" class="nav_logo w-nav-brand"></a>
      <nav role="navigation" class="nav-menu w-nav-menu"><a href="../course-list-page.html" class="nav_link">COURSES</a><a href="#" class="nav_link">LOGIN</a>
        <a href="#" class="become_member w-inline-block">
          <div class="become_member_txt">BECOME MEMBER</div>
        </a>
      </nav>
      <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div> --}}

@extends('layouts.frontend')

 @section('title')
   AKIL - ACCOUNT
 @endsection

  @section('content')
  <div class="section-2">
    @if(session('success'))

      <div class="alert alert-success">
         <h2 class="course_small_description" style="color:green; padding-bottom:10px;">
              {{ session('success') }}
         </h2>
      </div>

    @endif
    <div class="m_container w-container">
      <h1 class="normal_title"><strong class="accent">ACCOUNT </strong>INFORMATION.</h1>
      <div class="account-info" style="color:#fff;"><strong class="accent">Account Plan:</strong>
        @if ($data->subscribed('Premium membership'))
          Premium Member
        @else
          Member
        @endif

        @if($data->subscribed('Premium membership'))
          <a href="{{ route('subscription.cancel') }}" class="change">CANCEL SUBSCRIPTION</a>
        @else
          <a href="{{ route('subscription.index') }}" class="change">SUBSCRIBE NOW</a>
        @endif
      </div>
      <div class="account-info" style="color:#fff;"><strong class="accent">Next Payment Due:</strong>
        @if ($data->subscribed('Premium membership'))
          {{ \Carbon\Carbon::parse(\App\Models\Subscription::where('owner_id', $data->id)->first()->cycle_ends_at)->format('d-M-Y') ?? 'You are not a member'}}
        @endif
       </div>
      <div class="account-info" style="color:#fff;"><strong class="accent">Payment Method:</strong> Mollie - SECURE PAYMENTS </div>
      <div class="account-info" style="color:#fff;"><strong class="accent">E-Mail Adress:</strong> {{ $data->email }} <a href="{{ url('/user/profile') }}" class="change">CHANGE</a></div>
      <div class="account-info" style="color:#fff;"><strong class="accent">Password:</strong> ******* <a href="{{ url('/user/profile') }}" class="change">CHANGE</a></div>
      <div class="account-info">  <form method="POST" action="{{ route('logout') }}">
          @csrf
      <a class="change" href="{{ route('logout') }}"
      onclick="event.preventDefault();
                  this.closest('form').submit();">
              LOGOUT FROM ACCOUNT
      </a></div>
    </div>
    <div class="cta_bar">
      <h1 class="normal_title cta">GET ACCESS TO  <strong class="accent">EXCLUSIVE COURSES</strong>.</h1>
      @if ($data->subscribed('Premium membership'))
        <a href="" class="try_for_free_button cta w-inline-block">
          <div class="button_bg shadow"></div>
          <div class="text-block get_course">MEMBER AREA</div>
        </a>
      @else
        <a href="{{ route('subscription.index') }}" class="try_for_free_button cta w-inline-block">
          <div class="button_bg shadow"></div>
          <div class="text-block get_course">BECOME MEMBER</div>
        </a>
      @endif
    </div>
  </div>

@endsection
  {{-- <footer id="footer" class="footer">
    <div class="m_container w-container">
      <div class="footer-flex-container"><a href="#" class="footer-logo-link w-inline-block"><img src="https://uploads-ssl.webflow.com/5db1c76aadcfe25e881680fa/5db86dc421496616bf357c25_placeholder.svg" alt="" class="footer_logo"></a>
        <div>
          <h2 class="footer-heading">Legal</h2>
          <ul role="list" class="w-list-unstyled">
            <li><a href="#" class="footer-link">Terms and Conditions</a></li>
            <li><a href="#" class="footer-link">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
      <div class="text-block-2">Copyright © 2020 Coach Akil. All rights reserved. - Made by <a href="http://merlinsonlineservices.com" target="_blank" class="link">Merlins Online Services</a></div>
    </div>
  </footer>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5f62723428a4c86ad749af09" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="{{ asset('frontend_assets/js/akil-courses.js') }}" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html> --}}
