@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="panel panel-custom">
            <div class="panel-heading">HASIL DIAGNOSIS</div>
            <div class="panel-body">
                <div class="panel panel-custom">
                    <div class="panel-heading">
                        Gejala
                    </div>
                    <div class="panel-body">
                        @foreach ($ev as $key => $value)
                        <i class="fa fa-check"></i> {{ $value->gejala }}<br/>
                        @endforeach
                    </div>
                </div>
                <div class="panel panel-custom">
                    <div class="panel-heading">
                        Perangkingan
                    </div>
                    <div class="panel-body">
                        @php dump($ranking); @endphp
                    </div>
                </div>
                <div class="panel panel-custom">
                    <div class="panel-heading">
                        Hasil Akhir
                    </div>
                    <div class="panel-body">
                        Terdeteksi penyakit <b>@php echo $penyakit; @endphp</b> dengan derajat kepercayaan <b>@php echo $rate."%"; @endphp</b>
                    </div>
                </div>
                <a class="btn btn-outline-success" href="{{ route('diagnosa') }}">Kembali</a>
                <a class="btn btn-outline-success" href="{{ url('info-penyakit/detail') }}/{{ $kode_penyakit }}">Tentang Penyakit @php echo $penyakit; @endphp</a>
            </div>
        </div>
    </div>
</div>
@endsection