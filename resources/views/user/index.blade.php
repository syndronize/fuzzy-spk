@extends('core')
@section('title','Users')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue ">Data User
                <button type="button" onclick="tambahDatac()" class="btn btn-outline-dark mx-2"><i class="icon-copy dw dw-add-user"></i></button> 
            </h4>
        </div>
        <div class="pb-20">
            <div id="isiData">

            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modalAdd">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><div id="title"></div></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="action">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" id="username" name="username" type="text" placeholder="Username - Dibutuhkan untuk login">
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input class="form-control" id="umur" name="umur" type="number" placeholder="Umur">
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" id="password" name="password" type="password" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label>Status Akun</label>
                            <select class="form-control" name="status" id="status">
                                <option value="" disabled selected>--Pilih--</option>
                                <option value="Verifikasi">Verifikasi</option>
                                <option value="Belum Verifikasi">Belum Verifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="textarea_editor form-control border-radius-0" placeholder="Masukan Alamat" name="alamat" id="alamat" required></textarea>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary">Simpan</button>
            </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!-- Modal Hapus Data -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Apakah Anda Yakin?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        NO
                    </div>
                    <div class="col-6">
                        <button onclick="hapusData()" type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-check"></i></button>
                        YES
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <!-- Modal -->
    <script>
        var id, url, idDel

        function tambahDatac(){
            id=""
            $('#title').html('Tambah Data Pengguna');
            $('#modalAdd').modal('show');
        }
        
        function simpan(){
            if(id == "")
            {
                url = "{{url('/user-tambah')}}"
            }else{
                url = "{{url('/user-tambah')}}/"+id
            }
            $.ajax({
                url: url,
                type: "POST",
                dataType : "JSON",
                data: 
                    $('#action').serialize(), 
                success: function(data){
                    console.log(data);
                    if (data.bool) {
                        $('#modalAdd').modal('hide');
                        tampilData()
                    }else{
                        alert(data.alert)
                    }
                }
            });
        }

        function editData(data)
        {
            console.log(data);
            id = data.id

            $('#title').html('Edit Data Pengguna')
            $('#modalAdd').modal('show');

            $('#name').val(data.name);
            $('#username').val(data.username);
            $('#umur').val(data.umur);
            $('#alamat').val(data.alamat);
            // console.log(data.alamat);
        }

        function alertHapus(id)
        {
            idDel = id
            $('#modalHapus').modal('show')
        }

        function hapusData(){
            $.ajax({
                url:'{{url('user-hapus')}}/'+idDel,
                type : 'GET',
                dataType : "JSON",
                success : function(res){
                    if(res.bool){
                        tampilData();
                    }
                }
            })
        }

        function tampilData(){
            $('#isiData').load('{{route('user.tabel')}}');

        }
        $(document).ready(function(){
            tampilData();
        })
    </script>
@endsection
@endsection