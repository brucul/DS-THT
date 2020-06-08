<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    	<meta name="description" content="" />
    	<meta name="author" content="" />
        <!--[if IE]>
        	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/favicon.png') }}">
        <title>Sistem Pakar</title>
        <!-- BOOTSTRAP CORE STYLE  -->
          <link href="{{ asset('public/user/assets/css/bootstrap.css') }}" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
          <link href="{{ asset('public/user/assets/css/font-awesome.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
          <link href="{{ asset('public/user/assets/css/style.css') }}" rel="stylesheet" />
        <!-- GOOGLE FONT -->
          <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- DATATABLES -->
          <link href="{{ asset('public/user/assets/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />

    </head>
    <body>
    	<div class="top-container">
    		<img src="{{ asset('public/user/assets/img/logo.png') }}" />
    			<a class="btn-logout" role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off fa-2x"></i>
                    {{ __('Logout') }}
                </a>
    			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    				@csrf
	    		</form>
    	</div>
        @php
            $id = Crypt::encrypt(Auth::user()->id);
        @endphp
    	<div class="menu-top" id="myHeader" style="z-index: 1;">
    		<div class="container">
	    		<div class="navbar-collapse collapse">
	    			<ul id="top-menu" class="nav navbar-nav navbar-right">
	    				<li class="{{ (request()->is('home*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ route('home') }}">HOME</a></li>
	    				<li class="{{ (request()->is('info-penyakit*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ route('info.home') }}">INFO PENYAKIT</a></li>
	    				<li class="{{ (request()->is('diagnosis*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ route('diagnosa') }}">DIAGNOSIS</a></li>
	    				<li class="{{ (request()->is('riwayat-diagnosa*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ url('riwayat-diagnosa') }}/{{ $id }}">RIWAYAT DIAGNOSIS</a></li>
	    				<li class="{{ (request()->is('profil*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ url('profil') }}/{{ $id }}">PROFIL {{@Auth::user()->name}}</a></li>
	    			</ul>
	    		</div>
    		</div>
    	</div>
    	<!-- LOGO HEADER END-->
    	<div class="content-wrapper">
    		<div class="container">
    			<div class="row pad-botm">
    				<div class="col-md-12">
    					<h4 class="header-line">HALO {{@Auth::user()->name}} ,</h4>
    				</div>
    			</div>
                @include('sweetalert::alert')
    			@yield('content')
    		</div>
    	</div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <section class="footer-section">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				Sistem Pakar - Diagnosis Penyakit THT | 2020
        			</div>
        		</div>
        	</div>
        </section>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="{{ asset('public/user/assets/js/jquery-1.10.2.js') }}"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="{{ asset('public/user/assets/js/bootstrap.js') }}"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="{{ asset('public/user/assets/js/custom.js') }}"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="{{ asset('public/user/assets/js/dataTables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('public/user/assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
        <script>
        	window.onscroll = function() {myFunction()};

        	var header = document.getElementById("myHeader");
        	var sticky = header.offsetTop;

        	function myFunction() {
        		if (window.pageYOffset > sticky) {
        			header.classList.add("sticky");
        		} else {
        			header.classList.remove("sticky");
        		}
        	}
        </script>
    </body>
</html>