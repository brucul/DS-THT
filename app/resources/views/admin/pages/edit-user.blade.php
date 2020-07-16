@extends('admin.layouts.dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<br/>
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
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="{{ route('admin.update.profil') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Data User</h4><br/>
                    <div class="form-group row">
                        <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" required>
                        <label class="col-sm-4 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" class="form-control hurufSaja" value="{{ $user->name }}" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Tanggal Lahir : </label>
                        <div class="input-group col-sm-8">
                            <input type="text" name="tanggal" class="form-control tanggal" id="tanggal" placeholder="mm/dd/yyyy" value="{{ $tgl }}" required autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-8">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation1" name="jenis_kelamin" value="Laki-laki" required {{ ($user->jk == 'Laki-laki') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customControlValidation1">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Perempuan" required {{ ($user->jk == 'Perempuan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customControlValidation2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">No. HP</label>
                        <div class="col-sm-8">
                            <input type="text" name="no_hp" class="form-control angkaSaja" value="{{ $user->no_hp }}" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="alamat">{{ $user->alamat }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="{{ route('admin.update.pass') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Ganti Password</h4><br/>
                    <div class="form-group row">
                        <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" required>
                        <label class="col-sm-4 text-right control-label col-form-label">Password Lama</label>
                        <div class="col-sm-8">
                            <input type="password" name="old_pass" class="form-control" value="{{ substr($user->password,1,10) }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="text" name="new_pass" class="form-control" placeholder="Masukkan Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Password Baru (Lagi)</label>
                        <div class="col-sm-8">
                            <input type="text" name="new_pass2" class="form-control" placeholder="Masukkan Password Baru (Lagi)" required>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Ganti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    /*datwpicker*/
        jQuery('#tanggal').datepicker({
            autoclose: true,
            todayHighlight: true
        });
</script>
@endsection