@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <label class="control-label col-md-3">Penyakit : </label>
            <div class="col-md-9" style="padding-bottom: 50px">
                <input type="text" name="penyakit" class="form-control" value="{{ $fc->penyakit }}" readonly />
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach($gejala as $g)
                        <tr>
                            <td style="line-height: 35px;">{{$i++}}</td>
                            <td style="line-height: 35px;">{{$g->gejala}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col">YA</th>
                            <th scope="col">TIDAK</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G1">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G1 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G1 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G1">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G1 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G1 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G2">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G2 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G2 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G2">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G2 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G2 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G3">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G3 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G3 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G3">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G3 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G3 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G4">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G4 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G4 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G4">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G4 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G4 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G5">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G5 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G5 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G5">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G5 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G5 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G6">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G6 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G6 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G6">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G6 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G6 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G7">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G7 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G7 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G7">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G7 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G7 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G8">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G8 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G8 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G8">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G8 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G8 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G9">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G9 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G9 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G9">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G9 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G9 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G10">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G10 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G10 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G10">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G10 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G10 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G11">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G11 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G11 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G11">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G11 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G11 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G12">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G12 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G12 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G12">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G12 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G12 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G13">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G13 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G13 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G13">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G13 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G13 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G14">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G14 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G14 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G14">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G14 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G14 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G15">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G15 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G15 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G15">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G15 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G15 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G16">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G16 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G16 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G16">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G16 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G16 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G17">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G17 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G17 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G17">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G17 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G17 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G18">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G18 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G18 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G18">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G18 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G18 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G19">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G19 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G19 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G19">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G19 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G19 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G20">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G20 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G20 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G20">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G20 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G20 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G21">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G21 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G21 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G21">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G21 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G21 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G22">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G22 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G22 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G22">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G22 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G22 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G23">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G23 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G23 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G23">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G23 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G23 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G24">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G24 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G24 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G24">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G24 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G24 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G25">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G25 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G25 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G25">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G25 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G25 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G26">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G26 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G26 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G26">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G26 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G26 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G27">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G27 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G27 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G27">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G27 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G27 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G28">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G28 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G28 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G28">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G28 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G28 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G29">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G29 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G29 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G29">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G29 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G29 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G30">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G30 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G30 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G30">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G30 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G30 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G31">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G31 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G31 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G31">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G31 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G31 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G32">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G32 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G32 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G32">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G32 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G32 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G33">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G33 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G33 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G33">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G33 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G33 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G34">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G34 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G34 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G34">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G34 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G34 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G35">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G35 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G35 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G35">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G35 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G35 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G36">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G36 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G36 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G36">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G36 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G36 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G37">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G37 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G37 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G37">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G37 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G37 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G38">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G38 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G38 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G38">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G38 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G38 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G39">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G39 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G39 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G39">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G39 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G39 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G40">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G40 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G40 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G40">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G40 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G40 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G41">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G41 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G41 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G41">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G41 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G41 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G42">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G42 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G42 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G42">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G42 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G42 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G43">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G43 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G43 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G43">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G43 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G43 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G44">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G44 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G44 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G44">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G44 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G44 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G45">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G45 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G45 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G45">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G45 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G45 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G46">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G46 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G46 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G46">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G46 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G46 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G47">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G47 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G47 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G47">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G47 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G47 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G48">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $fc->G48 == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G48 == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="G48">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $fc->G48 == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $fc->G48 == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/admin/assets/extra-libs/DataTables/datatables.min.js') }}" rel="stylesheet"></script>
<script src="{{ asset('public/admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id;

        $(document).on('click', '.delete', function(){
            id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('.modal-title').text("Delete Record");
            $('#ok_button').text('OK');
        });

        $('#ok_button').click(function(){
            $.ajax({
                //url:"fc-rules/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Updating...');
                },
                success:function(data)
                {
                    $('#ok_button').text('OK');
                    setTimeout(function(){
                        $('#tabel_rule').DataTable().ajax.reload();
                        $('#confirmModal').modal('hide');
                    }, 2000);
                }
            })
        });

    });
</script>
@endsection