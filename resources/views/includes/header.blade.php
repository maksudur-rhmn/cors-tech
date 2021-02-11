<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="CORS TECH - Fitness Site Admin" name="description" />
        <meta content="CORS TECH" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->

        <link rel="shortcut icon" href="{{ asset('dashboard_assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        {{-- Custom Css --}}
        @yield('css')
        <!-- Icons Css -->
        <link href="{{ asset('dashboard_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('dashboard_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>


    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span style="color: #000; font-weight: bold;">
                                    CORS TECH
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="fas fa-compress"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{ Auth::user()->name }}</span>
                                <i class="fas fa-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ url('/user/profile') }}"><span class="align-middle">View Profile</span></a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="uil-cog"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ url('/') }}" class="logo logo-dark">
                        {{-- <span class="logo-sm">
                            <img src="{{ asset('dashboard_assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('dashboard_assets/images/logo-sm.png') }}" alt="" height="20">
                        </span> --}}

                        <span style="color: #000; font-weight: bold;" >CORS TECH</span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li class="">
                                <a class="" href="{{ url('/') }}">
                                    <i class="fas fa-globe"></i>
                                    <span>Visit website</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="{{ url('/member-area') }}">
                                    <i class="fas fa-globe"></i>
                                    <span>Visit Premium page</span>
                                </a>
                            </li>
                            <li class="@yield('mm-active1')">
                                <a class="@yield('active1')" href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="@yield('mm-active-category')">
                                <a class="@yield('active-category')" href="{{ route('category.index') }}">
                                    <i class="fab fa-stumbleupon-circle"></i>
                                    <span>Category</span>
                                </a>
                            </li>

                            <li class="@yield('mm-active-course')">
                                <a class="@yield('active-course')" href="{{ route('course.index') }}">
                                    <i class="fas fa-headset"></i>
                                    <span>
                                        Courses

                                    </span>
                                </a>
                            </li>

                            <li class="@yield('mm-active-lesson')">
                                <a class="@yield('active-lesson')" href="{{ route('lesson.index') }}">
                                    <i class="fab fa-youtube"></i>
                                    <span>Lessons</span>
                                </a>
                            </li>

                            <li class="@yield('mm-active-sale')">
                                <a class="@yield('active-sale')" href="{{ route('sale.index') }}">
                                    <i class="fab fa-first-order-alt"></i>
                                    <span>Sales</span>
                                </a>
                            </li>
                            <li class="@yield('mm-active-members')">
                                <a class="@yield('active-members')" href="{{ route('members.index') }}">
                                    <i class="fab fa-accusoft"></i>
                                    <span>Premium Articles</span>
                                </a>
                            </li>
                            <li class="@yield('mm-active-facebook')">
                                <a class="@yield('active-facebook')" href="{{ route('facebook.index') }}">
                                    <i class="fab fa-facebook"></i>
                                    <span>Facebook Group</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">@yield('breadcrumb-title')</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">CORS TECH</a></li>
                                            <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
