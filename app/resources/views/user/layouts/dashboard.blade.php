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
        <title>Diagnosis Penyakit THT</title>
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

          <link rel="stylesheet" type="text/css" href="{{ asset('public/user/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

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
    	<div class="menu-top" id="myHeader" style="z-index: 10;">
    		<div class="container">
	    		<div class="navbar-collapse collapse">
	    			<ul id="top-menu" class="nav navbar-nav navbar-right">
	    				<!--<li class="{{ (request()->is('home*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ route('home') }}">HOME</a></li>-->
	    				<li class="{{ (request()->is('home*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ route('home') }}" style="color: {{ (request()->is('home*')) ? 'black' : '' }}">Home</a></li>
	    				<li class="{{ (request()->is('diagnosis*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ url('diagnosis') }}/{{ $id }}" style="color: {{ (request()->is('diagnosis*')) ? 'black' : '' }}">DIAGNOSIS</a></li>
	    				<li class="{{ (request()->is('riwayat-diagnosa*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ url('riwayat-diagnosa') }}/{{ $id }}" style="color: {{ (request()->is('riwayat-diagnosa*')) ? 'black' : '' }}">RIWAYAT DIAGNOSIS</a></li>
	    				<li class="{{ (request()->is('profil*')) ? 'menu-top-active' : '' }}">
	    					<a href="{{ url('profil') }}/{{ $id }}" style="color: {{ (request()->is('profil*')) ? 'black' : '' }}">PROFIL {{@Auth::user()->name}}</a></li>
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
        				Sistem Pakar - Diagnosis Penyakit THT | @php echo date('Y'); @endphp
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
        <script src="{{ asset('public/user/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        @yield('js')
        
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
        	};

            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.angkaSaja').keypress(function(event) {
                    var charCode = (event.which) ? event.which : event.keyCode
                    if (charCode >= 48 && charCode <=57)
                        return true;
                    return false;
                });
                $('.hurufSpesial').keypress(function(event) {
                    var charCode = (event.which) ? event.which : event.keyCode
                    if ((charCode >= 65 && charCode <= 127)||(charCode >= 32 && charCode <= 47))
                        return true;
                    return false;
                });
                $('.hurufSaja').keypress(function(event) {
                    var charCode = (event.which) ? event.which : event.keyCode
                    if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122)||charCode == 32)
                        return true;
                    return false;
                });
                $('.tanggal').keypress(function(event) {
                    var charCode = (event.which) ? event.which : event.keyCode
                    if (charCode >= 48 && charCode <=57 || charCode == 47)
                        return true;
                    return false;
                });
            });
        </script>
    </body>
</html>