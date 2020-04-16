@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
@if (Session::has('success'))
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    <script>
        Swal.fire({!! Session::pull('success') !!});
    </script>
@endif
</br></br>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Penyakit Telinga</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Jenis Penyakit</th>
                        <th scope="col">Jumlah Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($telinga as $tlg)
                    <tr>
                        <td>{{ $tlg->penyakit }}</td>
                        <td>{{ $tlg->jumlah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Penyakit Hidung</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Jenis Penyakit</th>
                        <th scope="col">Jumlah Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hidung as $hdg)
                    <tr>
                        <td>{{ $hdg->penyakit }}</td>
                        <td>{{ $hdg->jumlah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Penyakit Tenggorokan</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Jenis Penyakit</th>
                        <th scope="col">Jumlah Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenggorokan as $tgg)
                    <tr>
                        <td>{{ $tgg->penyakit }}</td>
                        <td>{{ $tgg->jumlah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection