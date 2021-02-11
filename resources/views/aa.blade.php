<!DOCTYPE html>
<html lang="en-US">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="discrption" content="parallax one page">
    <meta name="keyword"
        content="agency, business, corporate, creative, freelancer, interior, joomla template, K2 Blog, minimal, modern, multipurpose, personal, portfolio, responsive, simple">

    <!--  Title -->
    <title>Akil - Fitness Website</title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&amp;subset=latin-ext" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- custom styles (optional) -->
    
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>

<body data-dsn-grid-mousemove="true">

    <!--  DSN Loader
    ================================================== -->
    <div class="dsn-loader">
        <div class="dsn-up"></div>
        <div class="dsn-progress-page"></div>
        <div class="dsn-down"></div>
    </div>
    <!-- End DSN Loader
    ================================================== -->


    <!-- Sticky Menu
================================================== -->
    <div class="header-top nav-mobile">
        <div class="header-container">

            <div class="logo">
                <a href="#">
                </a>
            </div>

            <div class="menu-icon" data-dsn-grid="parallax" data-dsn-grid-move="50">
                <div class="icon-m">
                    <span class="menu-icon__line menu-icon__line-left"></span>
                    <span class="menu-icon__line"></span>
                    <span class="menu-icon__line menu-icon__line-right"></span>
                </div>
            </div>

            <div class="nav">
                <div class="inner">
                    <div class="logo">
                        <a href="#">
                            <img src="assets/img/logo-dark.png" alt="">
                        </a>
                    </div>
                    <div class="nav__content">
                        <ul class="nav__list">
                            <li class="nav__list-item nav__list-dropdown">
                                <a href="#">Home</a>
                                @if (Route::has('login'))
                                @auth
                                   <li class="nav__list-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                @else
                                   <li class="nav__list-item"><a href="{{ route('login') }}">Login</a></li> 
            
                                    @if (Route::has('register'))
                                        <li class="nav__list-item"><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endif
                        @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="site-header">
        <div class="extend-container">
            <div class="inner-header">
                <div class="main-logo">
                    <a href="index-2.html">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <nav class=" accent-menu main-navigation">
                <ul class="extend-container">
                    @if (Route::has('login'))
                    @auth
                       <li class=""><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                       <li class=""><a href="{{ route('login') }}">Login</a></li> 

                        @if (Route::has('register'))
                            <li class=""><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endif
            @endif
                   
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Sticky Menu
================================================== -->



    <main class="dsn-grid-color">

        <!-- Header
        ================================================== -->
        <header class="header-project header-not content cover-bg">
            <div class="glitch" data-overlay="7">
                <div class="glitch__img cover-bg " data-image-src="assets/img/404.jpg" data-overlay="5"></div>
                <div class="glitch__img cover-bg " data-image-src="assets/img/404.jpg" data-overlay="5"></div>
                <div class="glitch__img cover-bg " data-image-src="assets/img/404.jpg" data-overlay="5"></div>
                <div class="glitch__img cover-bg " data-image-src="assets/img/404.jpg" data-overlay="5"></div>
                <div class="glitch__img cover-bg " data-image-src="assets/img/404.jpg" data-overlay="5"></div>
            </div>
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-12 content text-center">
                        <h2 class="content__title"><span>Fitness</span></h2>
                        <h5 class="des-header mb-30">Login to access the admin panel.</h5>
                        <a href="{{ url('/dashboard') }}" class="custom-btn">
                            <span class="custom-btn__label">Dashboard</span>

                            <span class="custom-btn__icon">

                                <span class="custom-btn__icon-small">
                                    <!--?xml version="1.0" encoding="utf-8"?-->
                                    <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                                        xml:space="preserve">
                                        <polygon points="33.7,95.8 27.8,90.5 63.9,50 27.8,9.5 33.7,4.2 74.6,50 ">
                                        </polygon>
                                    </svg>

                                </span>

                                <span class="custom-btn__icon-circle">
                                    <!--?xml version="1.0" encoding="utf-8"?-->
                                    <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                                        xml:space="preserve">
                                        <path class="bottomcircle"
                                            d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
                                        </path>
                                        <path class="topcircle"
                                            d="M18.2,18.2c17.6-17.6,46-17.6,63.6,0s17.6,46,0,63.6s-46,17.6-63.6,0">
                                        </path>
                                    </svg>

                                </span>


                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header
        ================================================== -->

    </main>

    <div data-dsn-grid="progress-circle" data-dsn-grid-stroke="#fff">
        <div class="icon__fixed" data-dsn-grid="parallax">
            <i class="fas fa-angle-up"></i>
        </div>
    </div>

    <!-- Optional JavaScript -->
    
    
    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/dsn-grid.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>