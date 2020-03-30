@extends('admin.layouts.dashboard')

@section('css')
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
                            <input type="text" name="nama" class="form-control" value="{{ $user->name }}" onKeyPress="return event.charCode < 48 || event.charCode > 57" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-right control-label col-form-label">Verifikasi E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" name="v_email" class="form-control" value="{{ $user->email_verified_at }}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection