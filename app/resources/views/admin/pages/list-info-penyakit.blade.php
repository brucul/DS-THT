@extends('admin.layouts.dashboard')

@section('css')
@endsection

@section('content')
</br></br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row">
    @foreach($penyakit as $p)
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-heart-pulse"></i></h1>
                <h6 class="text-white">{{ $p->penyakit }}</h6>
                <button type="button" class="btn btn-sm btn-outline-light" onclick="window.location.href='{{ url('admin/info-penyakit/edit') }}/{{ $p->kode_penyakit }}';">Edit</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')
@endsection