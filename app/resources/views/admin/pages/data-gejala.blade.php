@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<button data-toggle="tooltip" data-placement="right" title="Tambah Gejala" style="margin-bottom: 10px" type="button" class="btn btn-outline-primary margin-5" name="create_record" id="create_record"><i class="fa fa-plus"></i></button>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_gejala" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="60%">Gejala</th>
                        <th>Jenis Gejala</th>
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
                        <h4 class="modal-title">Add New Record</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-4">Gejala : </label>
                                <div class="col-md-12">
                                    <input type="text" name="gejala" id="gejala" class="form-control hurufSaja" autocomplete="off" />
                                </div>
                                <label class="control-label col-md-4">Jenis Gejala : </label>
                                <div class="col-md-12">
                                    <select class="select2 form-control custom-select" name="jenis" id="jenis" style="width: 100%; height:36px;">
                                        <option value="">Pilih Jenis Gejala . .</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Telinga">Telinga</option>
                                        <option value="Hidung">Hidung</option>
                                        <option value="Tenggorokan">Tenggorokan</option>
                                    </select>
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
                        <h4 class="confirm" align="center" style="margin-bottom: 10px;"></h4>
                        <h5 class="notif"></h5>
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

        $('#tabel_gejala').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('admin.gejala') }}",
            },
            columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'gejala', name: 'gejala' },
            { data: 'jenis', name: 'jenis' },
            { data: 'action', name: 'action', orderable: false }
            ]
        });

        $('#create_record').click(function(){
            $('#form_result').html('');
            $('.modal-title').text("Tambah Gejala");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
            $('#sample_form').trigger("reset");
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $('#sample_form').trigger("reset");
            $.get("{{ url('/admin/data-gejala') }}" +'/' + id +'/edit', function (html) {
                $('#gejala').val(html.data.gejala);
                $('#jenis').val(html.data.jenis);
                //$('[name="jenis"][value="Umum"]').prop('selected', true);
                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Edit Gejala");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            })
        });

        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == 'Add'){
                $.ajax({
                    url:"{{ route('admin.gejala.store') }}",
                    method:"POST",
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success:function(data){
                        var html = '';
                        if(data.errors){
                            html = '<div class="alert alert-danger">' + data.errors + '</div>';
                        }
                        if(data.success){
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function(){
                                $('#formModal').modal('hide');
                            }, 1500);
                            $('#sample_form')[0].reset();
                            $('#tabel_gejala').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
            }

            if($('#action').val() == "Edit"){
                $.ajax({
                    url:"{{ route('admin.gejala.update') }}",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                    success:function(data){
                        var html = '';
                        if(data.errors){
                            html = '<div class="alert alert-danger">' + data.errors + '</div>';
                        }
                        if(data.success){
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function(){
                                $('#formModal').modal('hide');
                            }, 1500);
                            $('#sample_form')[0].reset();
                            $('#tabel_gejala').DataTable().ajax.reload();
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
            $('.confirm').text('Are you sure you want to remove this data?');
            $('.notif').html('');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"data-gejala/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('.notif').html(html);
                    }
                    if(data.success){
                        html = '<div class="alert alert-success" align="center">Data berhasil dihapus</div>';
                        $('.notif').html(html);
                        setTimeout(function(){
                            $('#tabel_gejala').DataTable().ajax.reload();
                            $('#confirmModal').modal('hide');
                        }, 2000);
                    }
                }
            })
        });

    });
</script>
@endsection