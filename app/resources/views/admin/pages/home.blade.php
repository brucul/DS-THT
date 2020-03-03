@extends('admin.layouts.dashboard')

@section('css')
<link href="{{ asset('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')
@if (Session::has('success'))
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    <script>
        Swal.fire({!! Session::pull('success') !!});
    </script>
@endif
</br></br>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Browesr statistics</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Browser</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Chrome</td>
                        <td>8850</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>Internet Explorer</td>
                        <td>1540</td>
                    </tr>
                    <tr>
                        <td>Opera</td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td>Safari</td>
                        <td>1590</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Website statistics</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Site</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="link">Themeforest.com</a></td>
                        <td>1240</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1542</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1542</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Visited Pages</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Page</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="link">Freebies</a></td>
                        <td>1240</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Blog</a></td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Work</a></td>
                        <td>1542</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Site Template</a></td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">All categories</a></td>
                        <td>1542</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection