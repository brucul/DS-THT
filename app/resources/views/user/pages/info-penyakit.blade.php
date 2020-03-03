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
    <div class="col-md-4 col-sm-4">
        <div class="panel panel-info" style="max-height: 300px">
            <div class="panel-heading">
                {{ $p->kode }}
            </div>
            <div class="panel-body">
                <p>{{ substr($p->detail,1,200) }}</p>
            </div>
            <div class="panel-footer">
                <a href="{{ url('info-penyakit/detail') }}/{{ $p->kode }}" style="text-decoration: none">Read More . .</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection