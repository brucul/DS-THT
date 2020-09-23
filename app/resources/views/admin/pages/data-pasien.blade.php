@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<br/>
<div align="right">
    <button onclick="window.location.href='{{url('admin/riwayat-diagnosa/cetak-riwayat')}}';" class="btn btn-outline-success" target="_blank"><i class="fa fa-print"></i> CETAK PDF</button>
</div>
<br/>
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
            { data: 'diagnosis', name: 'diagnosis' },
            { data: 'action', name: 'action', orderable: false }
            ]
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
                url:"data-pasien/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    html = '<div class="alert alert-success" align="center">Data berhasil dihapus</div>';
                    $('.notif').html(html);
                    setTimeout(function(){
                        $('#tabel_pasien').DataTable().ajax.reload();
                        $('#confirmModal').modal('hide');
                    }, 2000);
                }
            })
        });

    });
</script>
@endsection