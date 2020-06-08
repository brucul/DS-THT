@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-custom">
            <div class="panel-heading">
                INFORMASI PENYAKIT
            </div>
            <div class="panel-body">
                @if($penyakit->detail != '')
                {!! $penyakit->detail !!}
                @else
                <center>TIDAK ADA INFORMASI TER-UPDATE</center>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection