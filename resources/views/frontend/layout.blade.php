<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/ezone/assets/img/favicon.png') }}">
    
    <!-- all css here -->
    <!-- CSS for desktop screens -->
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/login.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/navbar.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootsnav.css') }}">
    
    <!-- CSS for mobile screens -->
    <link rel="stylesheet" media="screen and (max-width: 767px)" href="{{ asset('themes/ezone/assets/css/mobile.css') }}">

    <script src="{{ asset('themes/ezone/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header -->

        <header>
          
<div class="demo">
            <div class="header-bottom-furniture wrapper-padding-3 border-top-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">
                       
                        <div class="furniture-search">
                        <form action="{{ url('products') }}" method="GET">
                            <input placeholder="Cari Disini" type="text" name="q" value="{{ isset($q) ? $q : null }}">
                            <button>
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                        </div>
                      
                        <div class="header-home">
                        <a class="icon-home-furniture" href="/">
                            <span><i class="fa fa-home"></i></span>
                            </a>
                        </div>
                        <div class="header-profile">
                            <a class="icon-profile-furniture" href="profile">
                                <span><i class="fa fa-user"></i></span>
                                {{-- <span class="link-text">Profile</span> --}}
                            </a>
                        </div>
                        <div class="wishlists-home">
                            <a class="icon-wishlists-furniture" href="wishlists">
                                <span><i class="fa fa-archive"></i></span>
                                {{-- <span class="link-text">Wishlists</span> --}}
                            </a>
                        </div>
                        <div class="header-orders">
                            <a class="icon-orders-furniture" href="orders">
                                <span><i class="fa fa-history"></i></span>
                                {{-- <span class="link-text">Orders</span> --}}
                            </a>
                        </div>
                            <div class="header-cart">
                            <a class="icon-cart-furniture" href="{{ url('carts') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="shop-count-furniture green">{{ Cart::count() }}</span>
                            </a>
                            <!-- @if (Cart::count() > 0)
                                
                            @endif -->
                        </div>
                        <div class="furniture-login">
                            <ul>
                                @guest
                                    <li><a href="{{ url('login') }}"><i class="ti-shift-right" style="font-size: 25px;">Login</i></a></li>
                                    
                                @else
                                    <li><a href="{{ url('profile') }}">{{ Auth::user()->first_name }}</a></li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="ti-shift-right" ></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </header>
        <!-- end -->
        
        @yield('content')
    
    
        <div id="loader" style="display: none;">
            <div id="loading" style="z-index:99999;position: fixed;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.3);display: flex;justify-content:center;align-items: center;" class="mx-auto">
                <p><img src="{{ asset('themes/ezone/assets/img/loading.gif') }}" /> Please Wait</p>
            </div>
        </div>

        <!-- end -->

		
		<!-- all js here -->
        
        <script src="{{ asset('themes/ezone/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/popper.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/main.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(".delete").on("click", function () {
                return confirm("Do you want to remove this?");
            });
        </script>
        @stack('script-alt')
    </body>
</html>