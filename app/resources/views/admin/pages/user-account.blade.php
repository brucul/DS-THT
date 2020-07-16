@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
<br/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_user" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Lengkap</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
            </table>
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
<script src="{{ asset('public/admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/libs/magnific-popup/meg.init.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tabel_user').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('admin.users.account') }}",
            },
            columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'name', name: 'nama' },
            { data: 'action', name: 'action', orderable: false }
            ]
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            window.location.href="users-account/edit/"+id;
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
                url:"users-account/destroy/"+id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    html = '<div class="alert alert-success" align="center">Data user berhasil dihapus</div>';
                    $('.notif').html(html);
                    setTimeout(function(){
                        $('#tabel_user').DataTable().ajax.reload();
                        $('#confirmModal').modal('hide');
                    }, 2000);
                }
            })
        });

    });
</script>
@endsection