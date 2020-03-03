@extends('user.layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                {{ $penyakit->kode }}
            </div>
            <div class="panel-body">
                {!! $penyakit->detail !!}
            </div>
        </div>
    </div>
</div>
@endsection