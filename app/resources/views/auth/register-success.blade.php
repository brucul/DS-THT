<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/admin/assets/images/favicon.png') }}">

	<title>Diagnosis Penyakit THT</title>
	<!-- Custom CSS -->
	<link href="{{ asset('public/admin/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{ asset('public/admin/dist/css/style.min.css') }}" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
		<div class="auth-box bg-dark border-top border-secondary">
			<div class="card" align="center">
				<h4 class="card-header">Register</h4>
				<div class="card-body">
					<p>Register berhasil, cek email anda untuk mengaktifkan akun.</p>
					<hr/>
					<button class="btn btn-outline-dark" onclick="window.location.href='{{ route('login') }}';">Login</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="{{ asset('public/admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="{{ asset('public/admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('public/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
    </script>
</body>

</html>