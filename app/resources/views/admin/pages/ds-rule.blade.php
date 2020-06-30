@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<button data-toggle="tooltip" data-placement="right" title="Tambah Rule" style="margin-bottom: 10px" type="button" class="btn btn-outline-primary margin-5" name="create_record" id="create_record"><i class="fa fa-plus"></i></button>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_rule" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Penyakit</th>
                        <th width="50%">Gejala</th>
                        <th width="10%">Bobot</th>
                        <th width="15%">Action</th>
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
                                <label class="control-label col-md-12">Penyakit : </label>
                                <div class="col-md-12">
                                    <select name="penyakit" id="penyakit" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        <option value="">Pilih Penyakit . .</option>
                                        <optgroup label="Telinga">
                                            @foreach($p_telinga as $p_tlg)
                                            <option value="{{ $p_tlg->kode_penyakit }}">{{ $p_tlg->penyakit }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Hidung">
                                            @foreach($p_hidung as $p_hdg)
                                            <option value="{{ $p_hdg->kode_penyakit }}">{{ $p_hdg->penyakit }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Tenggorokan">
                                            @foreach($p_tenggorokan as $p_tgg)
                                            <option value="{{ $p_tgg->kode_penyakit }}">{{ $p_tgg->penyakit }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
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
                                <label class="control-label col-md-12">Bobot : </label>
                                <div class="col-md-12">
                                    <input type="text" name="bobot" id="bobot" class="form-control bobot" />
                                </div>
                            </div>
                            <br />
                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-outline-success" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Confirmation</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-outline-danger">OK</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cancel</button>
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
            { data: 'penyakit', name: 'penyakit' },
            { data: 'gejala', name: 'gejala' },
            { data: 'bobot', name: 'bobot' },
            { data: 'action', name: 'action', orderable: false }
            ]
        });

        $('#create_record').click(function(){
            $('#form_result').html('');
            $('.modal-title').text("Tambah Rule");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
            $('#sample_form').trigger("reset");
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.get("{{ url('/admin/ds-rules') }}" +'/' + id +'/edit', function (html) {
                $('#penyakit').val(html.data.id_penyakit);
                $('#gejala').val(html.data.id_gejala).prop('selected', true);
                $('#bobot').val(html.data.bobot);
                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Edit Penyakit");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            })
        });

        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == 'Add'){
                $.ajax({
                    url:"{{ route('admin.ds-rules.store') }}",
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

            if($('#action').val() == "Edit"){
                $.ajax({
                    url:"{{ route('admin.ds-rules.update') }}",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                    success:function(data){
                        var html = '';
                        if(data.errors){
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
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
                });
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