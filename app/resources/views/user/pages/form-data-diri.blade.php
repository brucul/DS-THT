@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    @if (Session::has('toast_error'))
        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
        <script>
            Swal.fire({!! Session::pull('toast_error') !!})
        </script>
    @elseif (Session::has('toast_success'))
        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
        <script>
            Swal.fire({!! Session::pull('toast_success') !!})
        </script>
    @endif
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-custom">
            <div class="panel-heading">
                DATA USER
            </div>
            <div class="panel-body">
                <form action="{{ route('update.profil') }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" required>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Verifikasi E-mail ( Opsional )</label>
                                <input type="email" name="v_email" class="form-control" value="{{ $user->email_verified_at }}">
                            </div>
                            <hr/>
                            <input type="submit" class="btn btn-outline-custom" name="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-custom">
            <div class="panel-heading">
                GANTI PASSWORD
            </div>
            <div class="panel-body">
                <form action="{{ route('update.pass') }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" required>
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="old_pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="new_pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru ( Lagi )</label>
                            <input type="password" name="new_pass2" class="form-control" required>
                        </div>
                        <hr/>
                        <input type="submit" class="btn btn-outline-custom" name="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection