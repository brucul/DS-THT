@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    @if($info == 0)
    <div class="col-md-12 col-sm-12 col-xs-12" >
        <div class="alert alert-danger text-center">
            <h3> IMPORTANT NOTICE </h3> 
            <hr />
            <i class="fa fa-warning fa-4x"></i>
            <p>BELUM ADA INFORMASI PENYAKIT YANG DI-UPDATE !</p>
            <hr />
        </div>
    </div>
    @endif
    @foreach($penyakit as $p)            
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="alert alert-info back-widget-set text-center">
            <i class="fa fa-heartbeat fa-5x"></i>
            <h3>{{ $p->penyakit }}</h3>
            <a class="btn btn-outline-primary" href="{{ url('home/info-penyakit') }}/{{ $p->kode }}" style="text-decoration: none">Tentang {{ $p->penyakit }}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection