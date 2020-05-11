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
                        {{ $value->name }}<br/>
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
                        Terdeteksi penyakit @php echo $penyakit; @endphp dengan derajat kepercayaan @php echo $rate."%"; @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection