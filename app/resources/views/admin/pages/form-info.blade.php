@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/extra-libs/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.info.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" class="form-control" name="kode" id="kode" value="{{ $penyakit->kode }}">
                        <input type="hidden" class="form-control" name="hidden_id" id="hidden_id" value="{{ $penyakit->id }}">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="penyakit" class="col-3 control-label col-form-label">Nama Penyakit</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="penyakit" id="penyakit" value="{{ $penyakit->penyakit }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="kode" class="col-3 control-label col-form-label">Kode Penyakit</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" value="{{ $penyakit->kode }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea name="detail" id="summernote" required>{!! $penyakit->detail !!}</textarea>
                </br>
                <input type="submit" name="submit" class="btn btn-outline-dark" value="Update">
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('public/admin/assets/extra-libs/summernote/summernote-bs4.js') }}"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 500
    });
</script>
@endsection