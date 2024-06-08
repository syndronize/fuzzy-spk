@extends('core')
@section('title','Diagnosis')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Diagnosis</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Diagnosis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue ">Data Diagnosis
                <button type="button" onclick="tambahDataDiagnosis()" class="btn btn-outline-dark mx-2"><i class="icon-copy dw dw-add-user"></i></button> 
            </h4>
        </div>
        <div class="pb-20">
            <div id="isiData">

            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Diagnosis</label>
                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Input Text Here">
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



@section('script')
<script>
    var id, url, idDel

    function tambahDataDiagnosis(){
        id=""
        $('#title').html('Tambah Data Diagnosis');
        $('#modalAdd').modal('show');
    }
    
    function simpan(){
        if(id == "")
        {
            url = "{{url('/diagnosis-tambah')}}"
        }else{
            url = "{{url('/diagnosis-tambah')}}/"+id
        }
        $.ajax({
            url: url,
            type: "POST",
            dataType : "JSON",
            data: 
                $('#action').serialize(), 
            success: function(data){
                console.log('data simpan : ' + data);
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
        id = data.id

        $('#title').html('Edit Data Diagnosis')
        $('#modalAdd').modal('show');

        $('#nama').val(data.nama);
        // console.log(data.alamat);
    }

    function alertHapus(id) {
    idDel = id;  
    Swal.fire({
        title: "Are You Sure to Delete this Data?",
        showDenyButton: true,
        showCancelButton: true,
        showConfirmButton : false,
        // confirmButtonText: "Delete it !",
        denyButtonText: `Delete it !`
        }).then((result) => {
            if (result.isDenied) {
                $.ajax({
                    url:'{{url('diagnosis-hapus')}}/'+idDel,
                    type : 'GET',
                    dataType : "JSON",
                    success : function(res){
                        if(res.bool){
                            tampilData();
                        }
                    }
                })
                Swal.fire("deleted", "", "success");
            }
    });
}

    function hapusData(){
        $.ajax({
            
        })
    }

    function tampilData(){
        $('#isiData').load('{{route('diagnosis.data')}}');

    }
    $(document).ready(function(){
        tampilData();
    })
</script>
@endsection
@endsection
