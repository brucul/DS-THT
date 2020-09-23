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
                        @foreach ($kode as $key => $value)
                            @foreach ($value as $val => $v)

                        <tr>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="{{ $val }}">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="1">
                                    <input class="btn {{ $v == 1 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $v == 1 ? 'disabled' : '' }}>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.fc-rules.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kode" value="{{ $val }}">
                                    <input type="hidden" name="penyakit" class="form-control" value="{{ $fc->kode_penyakit }}">
                                    <input type="hidden" name="value" value="0">
                                    <input class="btn {{ $v == 0 ? 'btn-warning' : 'btn-outline-warning' }}" type="submit" value="&#10004" {{ $v == 0 ? 'disabled' : '' }}>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
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