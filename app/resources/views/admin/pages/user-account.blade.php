@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row el-element-overlay">
    @foreach($users as $user)
    @php
        $id = Crypt::encrypt($user->id);
    @endphp
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                    <img src="{{ asset('public/admin/assets/images/users/1.jpg') }}" alt="user" />
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{ url('admin/users-account/edit') }}/{{ $id }}"><i class="mdi mdi-magnify-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h4 class="m-b-0">{{$user->name}}</h4>
                    <span class="text-muted">{{$user->email}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')
<script src="{{ asset('public/admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/libs/magnific-popup/meg.init.js') }}"></script>
@endsection