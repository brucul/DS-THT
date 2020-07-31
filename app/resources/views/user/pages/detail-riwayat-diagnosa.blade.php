@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-custom">
            <div class="panel-heading">
                Detail Diagnosis
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-3"><label>Nama Lengkap</label></div>
                            <div class="col-md-9"><input type="text" class="form-control" value="{{$data->name}}" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label>Tanggal Lahir</label></div>
                            <div class="col-md-9"><input type="text" class="form-control" value="{{$data->tgl_lahir}}" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label>Jenis Kelamin</label></div>
                            <div class="col-md-9"><input type="text" class="form-control" value="{{$data->jk}}" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label>No. HP</label></div>
                            <div class="col-md-9"><input type="text" class="form-control" value="{{$data->no_hp}}" readonly></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label>Alamat</label></div>
                            <div class="col-md-9"><textarea class="form-control" style="height: 100px" readonly>{{$data->alamat}}</textarea></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group row">
                            <div class="col-md-3"><label>Diagnosis</label></div>
                            <div class="col-md-9">
                                @foreach ($penyakit as $key => $value)
                                {{ $data->prosentase }}% - {{ $value }}<br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label>Gejala</label></div>
                            <div class="col-md-9">
                                @foreach ($gejala as $key => $value)
                                <i class="fa fa-check"></i> {{ $value->gejala }}<br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection