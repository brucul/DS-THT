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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div>
                    <div class="text-center p-b-20">
                        <span class="db"><img src="{{ asset('public/admin/assets/images/logo.png') }}" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" autocomplete="off" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1" data-toggle="tooltip" title="Masukkan nama lengkap anda !"><i class="ti-user"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror hurufSaja" name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="Nama Lengkap" aria-label="Username" aria-describedby="basic-addon1" autofocus style="border: none;">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1" data-toggle="tooltip" title="Masukkan email anda !"><i class="ti-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Email" aria-describedby="basic-addon1" style="border: none;">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2" data-toggle="tooltip" title="Password minimal 8 karakter !"><i class="ti-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" style="border: none;">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2" data-toggle="tooltip" title="Ulangi password anda !"><i class="ti-key"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="off" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1" style="border: none;">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <!--Custom JavaScript -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
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
            $('.bobot').keypress(function(event) {
                var charCode = (event.which) ? event.which : event.keyCode
                if (charCode >= 48 && charCode <=57 || charCode == 46)
                    return true;
                return false;
            });
        });
    </script>
</body>

</html>