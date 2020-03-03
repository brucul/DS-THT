@extends('user.layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-custom">
                <div class="panel-heading"> Hasil Diagnosa </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Hasil Diagnosa</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $r)
                                <tr>
                                    <td>{{ $r->nama }}</td>
                                    <td>{{ $r->nama }}</td>
                                    <td>{{ $r->jk }}</td>
                                    <td>{{ $r->no_hp }}</td>
                                    <td>{{ $r->alamat }}</td>
                                    <td>{{ $r->diagnosa }}</td>
                                    <td>{{ $r->diagnosa }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
</div>
@endsection
