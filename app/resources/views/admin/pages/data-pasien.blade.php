@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_pasien" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Hasil Diagnosis</th>
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
                                <label class="control-label col-md-4">Nama : </label>
                                <div class="col-md-12">
                                    <input type="text" name="nama" id="nama" class="form-control hurufSaja" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Lahir : </label>
                                <div class="input-group col-md-12">
                                    <input type="text" name="tanggal" class="form-control tanggal" id="tanggal" placeholder="mm/dd/yyyy" autocomplete="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Jenis Kelamin :</label>
                                <div class="col-md-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation1" name="jenis_kelamin" value="Laki-laki" required>
                                        <label class="custom-control-label" for="customControlValidation1">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Perempuan" required>
                                        <label class="custom-control-label" for="customControlValidation2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">No. HP : </label>
                                <div class="col-md-12">
                                    <input type="text" name="no_hp" id="no_hp" class="form-control angkaSaja" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Alamat : </label>
                                <div class="col-md-12">
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
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
<script src="{{ asset('public/admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();
    /*datwpicker*/
        jQuery('#tanggal').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tabel_pasien').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('admin.pasien') }}",
            },
            columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'name', name: 'name' },
            { data: 'tgl_lahir', name: 'tgl_lahir' },
            { data: 'jk', name: 'jenis_kelamin' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'alamat', name: 'alamat' },
            { data: 'penyakit', name: 'penyakit' },
            { data: 'action', name: 'action', orderable: false }
            ]
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.get("{{ url('/admin/data-pasien') }}" +'/' + id +'/edit', function (html) {
                $('#nama').val(html.data.name);
                $('#tanggal').val(html.tgl);
                //$('#jenis_kelamin [value="'+data.jk+'"]').prop('checked', true);
                $('[name="jenis_kelamin"][value="'+html.data.jk+'"]').prop('checked', true);
                $('#no_hp').val(html.data.no_hp);
                $('#alamat').val(html.data.alamat);
                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Edit Data Pasien");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            })
        });

        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == "Edit"){
                $.ajax({
                    url:"{{ route('admin.pasien.update') }}",
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
                            $('#tabel_pasien').DataTable().ajax.reload();
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
                url:"data-pasien/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    setTimeout(function(){
                        $('#tabel_pasien').DataTable().ajax.reload();
                        $('#confirmModal').modal('hide');
                    }, 1500);
                }
            })
        });

    });
</script>
@endsection