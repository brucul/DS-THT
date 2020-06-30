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
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control hurufSaja" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Verifikasi E-mail ( Opsional )</label>
                                <input type="email" name="v_email" class="form-control" value="{{ $user->email_verified_at }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tanggal" class="form-control tanggal" id="datepicker-autoclose" placeholder="mm/dd/yyyy" value="{{ $tgl }}" required>
                                    <span class="form-group input-group-btn">
                                        <button class="btn btn-default" type="button" disabled><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <label class="checkbox-label" style="margin-bottom: 10px;">
                                    <input type="radio" name="jenis_kelamin" id="l" value="Laki-laki" {{ ($user->jk == 'Laki-laki') ? 'checked' : '' }} required>&emsp;&emsp;&emsp;Laki-laki
                                    <span class="checkbox-custom circular"></span>
                                </label>
                                <label class="checkbox-label">
                                    <input type="radio" name="jenis_kelamin" id="p" value="Perempuan" {{ ($user->jk == 'Perempuan') ? 'checked' : '' }} required>&emsp;&emsp;&emsp;Perempuan
                                    <span class="checkbox-custom circular"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" name="no_hp" class="form-control angkaSaja" value="{{ $user->no_hp }}" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" style="height: 120px" required>{{ $user->alamat }}</textarea>
                            </div>
                            <hr/>
                            <input type="submit" class="btn btn-outline-success" name="submit" value="Update">
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
                            <i class="help-block">Masukkan password lama.</i>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="new_pass" class="form-control" required>
                            <i class="help-block">Password minimal 8 karakter.</i>
                        </div>
                        <div class="form-group">
                            <label>Password Baru ( Lagi )</label>
                            <input type="password" name="new_pass2" class="form-control" required>
                            <i class="help-block">Ulangi password baru.</i>
                        </div>
                        <hr/>
                        <input type="submit" class="btn btn-outline-success" name="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection