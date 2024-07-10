@extends('core')
@section('title','Diagnosis Gejala')
@section('style')
<link rel="stylesheet" type="text/css"
    href="{{('/')}}asset/deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="{{('/')}}asset/deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{('/')}}asset/deskapp/src/plugins/jquery-steps/jquery.steps.css">
@endsection
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Diagnosis Gejala</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Diagnosis Gejala</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-black ">Diagnosis Gejalamu
                <button type="button" onclick="diagnose()" class="btn btn-outline-dark mx-2"><i class="icon-copy dw dw-analytics-5"></i></i></button> 
            </h4>
        </div>
    </div>
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-black ">Dataset Diagnosa Gejala
            </h4>
        </div>
        <div class="pb-20">
            <div id="isiData">

            </div>
        </div>
        
    </div>
   
</div>
<div class="modal fade bs-example-modal-lg" id="modalDiagnose" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Questioner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard">
                        <h5></h5>
                        <section>
                            <p>pilih gejala yang kamu alami dengan mencentang gejalanya, pilih next untuk pilihan berikutnya dan pilih submit untuk mengakhiri test.</p>
                            <p>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama Client</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" id="namaClient" type="text" placeholder="Klik Disini untuk Nama Client">
                                    </div>
                                </div>
                            </p>
                        </section>
                        
                        @foreach($gejala as $key => $data)
                        <h5></h5>
                        <section>
                            <div class="custom-control custom-checkbox mb-5">
                                <input type="checkbox" class="custom-control-input" id="status{{$key+1}}">
                                <label class="custom-control-label" for="status{{$key+1}}">{{$data->nama}}</label>
                            </div>
                        </section>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" class="btn btn-primary" onclick="submitData()">submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modalResult">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Result</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
					<div class="col-md-8 mb-30">

                <div class="pd-20 card-box height-100-p">

                <h4 class="h4 text-blue">Result Chart</h4>
                <div id="chartresult"></div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="closeReload()">submit</button>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="{{('/')}}asset/deskapp/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<!-- Datatable Setting js -->
<script src="{{('/')}}asset/deskapp/vendors/scripts/datatable-setting.js"></script>
</body>
<!-- Step Wizard Setting -->
<script src="{{('/')}}asset/deskapp/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="{{('/')}}asset/deskapp/vendors/scripts/steps-setting.js"></script>
<script src="{{('/')}}asset/deskapp/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="{{('/')}}asset/deskapp/vendors/scripts/apexcharts-setting.js"></script>
<script>
    function diagnose(){
        $('#modalDiagnose').modal('show');
    }
    function submitData(){
        var status1 = document.getElementById('status1');
        var status2 = document.getElementById('status2');
        var status3 = document.getElementById('status3');
        var status4 = document.getElementById('status4');
        var status5 = document.getElementById('status5');
        var status6 = document.getElementById('status6');
        var status7 = document.getElementById('status7');
        var status8 = document.getElementById('status8');
        var status9 = document.getElementById('status9');
        var status10 = document.getElementById('status10');
        var status11 = document.getElementById('status11');
        var status12 = document.getElementById('status12');
        var status13 = document.getElementById('status13');
        var status14 = document.getElementById('status14');
        var nama = $('#namaClient').val();
        var url = "{{url('/getdiagnose')}}"
        $.ajax({
            url : url,
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure this meta tag is in your HTML head
            },
            dataType : "JSON",
            data : {
                status1 : status1.checked,
                status2 : status2.checked,
                status3 : status3.checked,
                status4 : status4.checked,
                status5 : status5.checked,
                status6 : status6.checked,
                status7 : status7.checked,
                status8 : status8.checked,
                status9 : status9.checked,
                status10 : status10.checked,
                status11 : status11.checked,
                status12 : status12.checked,
                status13 : status13.checked,
                status14 : status14.checked
            },success : function(res){
                var depresi = res.Depresi; 
                var bipolar = res.Bipolar; 
                var skizo = res.Skizofrenia; 
                var gangguan = res["Gangguan Kecemasan"]; 
                $('#modalDiagnose').modal('hide');
                $('#modalResult').modal('show');
                // status1.checked = false;
                var optionsresult = {
                    series: [depresi, bipolar, skizo, gangguan],
	                labels: ['Depresi', 'Bipolar', 'Skizofrenia', 'Gangguan Kecemasan'],
                    chart: {
                        type: 'donut',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 100
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                var chart = new ApexCharts(document.querySelector("#chartresult"), optionsresult);
                chart.render();

                var urlsave = "{{url('/saveclient')}}"

                $.ajax({
                    url : urlsave,
                    type : "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure this meta tag is in your HTML head
                    },
                    dataType : "JSON",
                    data : {
                        depresi : depresi,
                        bipolar : bipolar,
                        skizofernia : skizo,
                        gangguan : gangguan,
                        nama : nama
                    },success : function(res){
                        console.log(res);
                    }
                })

                
            }
        })
    }
    

    function closeReload(){
        location.reload();
    }

    function tampilData(){
        $('#isiData').load('{{route('dg.data')}}');

    }
    $(document).ready(function(){
        tampilData();
    })
</script>
@endsection
@endsection
