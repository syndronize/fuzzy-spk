@extends('core')
@section('title','Client')
@section('style')
<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">

@endsection
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Client</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-black ">Data Result Client
            </h4>
        </div>
        <div class="pb-20">
            <div id="isiData">
                <table class="data-table table stripe hover nowrap text-center">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No.</th>
                            <th>Nama Client</th>
                            <th>Normal</th>
                            <th>Ringan</th>
                            <th>Sedang</th>
                            <th>Berat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client as $key => $data)
                        <tr>
                            <td class="table-plus">{{$key+1}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->normal}} </td>
                            <td>{{$data->ringan}} </td>
                            <td>{{$data->sedang}} </td>
                            <td>{{$data->berat}} </td>
                            
                
                        </tr>
                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->
@section('script')
    <script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <!-- Datatable Setting js -->
	<script src="{{('/')}}asset/deskapp/vendors/scripts/datatable-setting.js"></script></body>
@endsection
@endsection
