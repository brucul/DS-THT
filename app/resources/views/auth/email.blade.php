<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link href="{{ asset('public/admin/dist/css/style.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-12">
			<div class="card" align="center">
				<div class="card-header">Register Berhasil</div>
				<div class="card-body">
					Selamat anda berhasil terdaftar, klik tombol di bawah untuk mengaktifkan akun anda.
				</div>
				<div class="card-footer">
					<a href="{{$link}}" class="btn btn-outline-info">Verifikasi</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>