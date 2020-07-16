@extends('user.layouts.dashboard')

@section('content')
@php
            $id = Crypt::encrypt(Auth::user()->id);
        @endphp
<div class="row">
    <div class="col-12">
        @if(@Auth::user()->tgl_lahir!='' && @Auth::user()->jk!='' && @Auth::user()->no_hp!=0 && @Auth::user()->alamat!='')
        <div class="panel panel-custom">
            <div class="panel-heading">FORM DIAGNOSIS</div>
            <div class="panel-body">
                <form action="{{route('hasil-diagnosis')}}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            DATA DIRI
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="tanggal" class="form-control" value="{{ $user->tgl_lahir }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="{{ $user->jk }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" style="height: 120px" readonly>{{$user->alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            FORM GEJALA
                        </div>
                        <div class="panel-body">
                            <div style="padding: 5px; border-radius: 5px; background: #3c408f; color: white; margin-bottom: 10px">
                                <center><b>Pilih minimal 2 (dua) gejala yang anda rasakan.</b></center>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Gejala Umum</label>
                                        <hr/>
                                        @foreach($g_umum as $g_u)
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="evidence[]" class="gejala" value="{{ $g_u->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_u->gejala }}
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Gejala Telinga</label>
                                        <hr/>
                                        @foreach($g_telinga as $g_tl)
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="evidence[]" class="gejala" value="{{ $g_tl->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_tl->gejala }}
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Gejala Hidung</label>
                                        <hr/>
                                        @foreach($g_hidung as $g_h)
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="evidence[]" class="gejala" value="{{ $g_h->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_h->gejala }}
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Gejala Tenggorokan</label>
                                        <hr/>
                                        @foreach($g_tenggorokan as $g_tg)
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="evidence[]" class="gejala" value="{{ $g_tg->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_tg->gejala }}
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <input type="submit" name="submit" class="btn btn-outline-success submit" value="Diagnosis Saya . .">
                </form>
            </div>
        </div>
        @else
        <div class="alert alert-danger text-center">
            <h3 style="font-weight: bold;"> IMPORTANT NOTICE</h3> 
            <hr />
            <i class="fa fa-warning fa-4x"></i>
            <p style="font-size: 16px">Profil anda belum lengkap, untuk bisa melakukan diagnosis silakan lengkapi profil anda !</p>
            <hr />
            <a href="{{ url('profil') }}/{{ $id }}" class="btn btn-outline-danger">Lengkapi Profil</a> 
        </div>
        @endif
    </div>
</div>
@endsection
@section('js')
        <script type="text/javascript">
            $('.submit').prop('disabled', !$('.gejala:checked').length); //initially disable/enable button based on checked length
            $('input[type=checkbox]').click(function() {
               //console.log($('.tab1_chk:checkbox:checked').length);
               if ($('.gejala:checkbox:checked').length > 1) {
                 $('.submit').prop('disabled', false);
               } else {
                 $('.submit').prop('disabled', true);
               }
             });
        </script>
@endsection