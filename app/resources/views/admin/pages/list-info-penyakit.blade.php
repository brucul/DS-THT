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
    <div class="col-md-4">
        <div class="card" style="max-height: 300px">
            <div class="card-body">
                <h5 class="card-title">{{ $p->penyakit }}</h5>
                <!--<p>{{ substr($p->detail,1,200) }}</p>-->
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-outline-dark" onclick="window.location.href='{{ url('admin/info-penyakit/edit') }}/{{ $p->kode_penyakit }}';">Edit</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')
@endsection