@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel_rule" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="100%">Penyakit</th>
                        <th>Action</th>
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
                            <div class="form-group row">
                                <label class="control-label col-md-3">Penyakit : </label>
                                <div class="col-md-9">
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
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-9 control-label col-form-label">First Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
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
                url: "{{ route('admin.fc-rules') }}",
            },
            columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'penyakit', name: 'penyakit' },
            { data: 'action', name: 'action', orderable: false }
            ]
        });

        $('#create_record').click(function(){
            $('.modal-title').text("Tambah Rule");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
            $('#sample_form').trigger("reset");
        });

    });
</script>
@endsection