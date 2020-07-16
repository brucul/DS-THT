@extends('user.layouts.dashboard')

@section('content')
@php
    $id = Crypt::encrypt(Auth::user()->id);
@endphp
<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-custom">
                <div class="panel-heading">Hasil Diagnosa</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Hasil Diagnosis</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($riwayat as $r)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->jk }}</td>
                                    <td>{{ $r->no_hp }}</td>
                                    <td>{{ $r->alamat }}</td>
                                    <td>{{ $r->penyakit }} - {{ $r->prosentase }} %</td>
                                    <td><a href="{{ url('riwayat-diagnosa/detail') }}/{{ $r->id_pasien }}" class="btn btn-outline-success">Detail Diagnosis</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Advanced Tables -->
            <hr/>
            <button onclick="window.location.href='{{url('riwayat-diagnosa/cetak-riwayat')}}/{{$id}}';" class="btn btn-outline-success" target="_blank" {{ ($count==0) ? 'disabled' : '' }}><i class="fa fa-print"></i> CETAK PDF</button>
        </div>
    </div>
</div>
@endsection