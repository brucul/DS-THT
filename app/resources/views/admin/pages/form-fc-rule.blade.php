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
            <div class="col-md-9">
                <input type="text" name="penyakit" class="form-control" value="{{ $fc->penyakit }}" readonly />
                <button data-toggle="tooltip" data-placement="right" title="Tambah Rule" style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-outline-primary margin-5" name="create_record" id="create_record"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="table-responsive">
            <div class="row">
                <div class="col-md-9">
                    @foreach($gejala as $g)
                    {{$g->gejala}}<br/>
                    @endforeach
                </div>
                <div class="col-md-3">
                    {{$fc->G1}}<br/>
                    {{$fc->G2}}<br/>
                    {{$fc->G3}}<br/>
                    {{$fc->G4}}<br/>
                    {{$fc->G5}}<br/>
                    {{$fc->G6}}<br/>
                </div>
            </div>
            <table id="tabel_rule" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="100%">Gejala</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal -->
        <div id="formModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Rule</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-12">Gejala : </label>
                                <div class="col-md-12">
                                    <select name="gejala" id="gejala" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        <option value="">Pilih Gejala . .</option>
                                        <optgroup label="Umum">
                                            @foreach($g_umum as $g_u)
                                            <option value="{{ $g_u->kode_gejala }}">{{ $g_u->gejala }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Telinga">
                                            @foreach($g_telinga as $g_tlg)
                                            <option value="{{ $g_tlg->kode_gejala }}">{{ $g_tlg->gejala }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Hidung">
                                            @foreach($g_hidung as $g_hdg)
                                            <option value="{{ $g_hdg->kode_gejala }}">{{ $g_hdg->gejala }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Tenggorokan">
                                            @foreach($g_tenggorokan as $g_tgg)
                                            <option value="{{ $g_tgg->kode_gejala }}">{{ $g_tgg->gejala }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" value="{{$fc->penyakit}}" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-outline-success" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
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

        $('#tabel_rule').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('admin.ds-rules') }}",
            },
            columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'gejala', name: 'gejala' }
            ]
        });

        $('#create_record').click(function(){
            $('.modal-title').text("Tambah Rule");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
            $('#sample_form').trigger("reset");
            $('#form_result').html('');
        });

        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == 'Add'){
                $.ajax({
                    url:"{{ route('admin.fc-rules.update') }}",
                    method:"POST",
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success:function(data){
                        var html = '';
                        if(data.errors){
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++){
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success){
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function(){
                                $('#formModal').modal('hide');
                            }, 1500);
                            $('#sample_form')[0].reset();
                            $('#tabel_rule').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
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
                url:"ds-rules/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
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