@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
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
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <label class="checkbox-label" style="margin-bottom: 10px;">
                                            <input type="radio" name="jenis_kelamin" id="l" value="Laki-laki" required>&emsp;&emsp;&emsp;Laki-laki
                                            <span class="checkbox-custom circular"></span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="radio" name="jenis_kelamin" id="p" value="Perempuan" required>&emsp;&emsp;&emsp;Perempuan
                                            <span class="checkbox-custom circular"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" name="no_hp" class="form-control" onKeyPress="return event.charCode >= 48 && event.charCode <=57" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" style="height: 100px" required></textarea>
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
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Gejala Umum</label>
                                        <hr/>
                                        @foreach($g_umum as $g_u)
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="evidence[]" value="{{ $g_u->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_u->gejala }}
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
                                            <input type="checkbox" name="evidence[]" value="{{ $g_tl->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_tl->gejala }}
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
                                            <input type="checkbox" name="evidence[]" value="{{ $g_h->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_h->gejala }}
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
                                            <input type="checkbox" name="evidence[]" value="{{ $g_tg->kode_gejala }}">&emsp;&emsp;&emsp;{{ $g_tg->gejala }}
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <input type="submit" name="submit" class="btn btn-outline-success" value="Proses">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection