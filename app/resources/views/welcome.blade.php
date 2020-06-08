<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Pakar</title>

        <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('public/landing/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('public/landing/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/landing/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/landing/css/main.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <!-- Start Header Area -->
        <header class="default-header">
            <div class="sticky-header">
                <div class="container">
                    <div class="header-content d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="" class="smooth"><img src="{{ asset('public/landing/img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="right-bar d-flex align-items-center">
                            <div class="search relative">
                                <p>&nbsp;</p>
                            </div>
                            <div class="header-social d-flex align-items-center">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        @if (Auth::user()->is_admin == 1)
                                            <a href="{{ url('/admin') }}">Home</a>
                                        @else
                                            <a href="{{ url('/home') }}">Home</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}">Sign In</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Sign Up</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->
        <!-- Start Banner Area -->
        <section class="banner-area relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row fullscreen justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div class="banner-content text-center">
                            <p class="text-uppercase text-white">Selamat Datang</p>
                            <h2 class="text-uppercase text-white">SISTEM PAKAR DIAGNOSIS PENYAKIT THT</h2>
                            <a href="{{ route('diagnosa') }}" class="primary-btn banner-btn">Mulai Diagnosis<span class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('public/landing/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ asset('public/landing/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/landing/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('public/landing/js/mixitup.min.js') }}"></script>
        <script src="{{ asset('public/landing/js/main.js') }}"></script>
    </body>
</html>
