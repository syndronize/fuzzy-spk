@extends('core')
@section('title',('Home'))
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Title</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Title</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">5 Skor Tertinggi</h2>
                <div id="chart5"></div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Jumlah Anggota</h2>
                <div id="chartx"></div>
            </div>
        </div>
    </div>
</div>
@section('script')
{{-- <script src="{{('/')}}asset/deskapp/src/plugins/highcharts-6.0.7/code/highcharts.js"></script> --}}
{{-- <script src="{{('/')}}asset/deskapp/src/plugins/apexcharts/apexcharts.min.js"></script> --}}

{{-- <script>

    var options5 = {
        chart: {
            height: 350,
            type: 'bar',
            parentHeightOffset: 0,
            fontFamily: 'Poppins, sans-serif',
            toolbar: {
                show: false,
            },
        },
        colors: ['#1b00ff', '#f56767'],
        grid: {
            borderColor: '#c7d2dd',
            strokeDashArray: 5,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Kapak',
            data: [<?php foreach($nilai_pisau as $s){ echo $s->rangking_saw.',';} ?>],
        }, {
            name: 'Pisau',
            data: [<?php foreach($nilai_kapak as $nilai_kapak){ echo $nilai_kapak->rangking_saw.',';} ?>],
        }],
        xaxis: {
            categories: [1,2,3,4,5],

            axisBorder: {
                show: false
            },
            labels: {
                style: {
                    colors: ['#353535'],
                    fontSize: '16px',
                },
            },
            axisBorder: {
                color: '#8fa6bc',
            }
        },
        yaxis: {
            title: {
                text: '',
            },
            labels: {
                style: {
                    colors: '#353535',
                    fontSize: '16px',
                },
            },
            axisBorder: {
                color: '#f00',
            }
        },
        legend: {
            horizontalAlign: 'right',
            position: 'top',
            fontSize: '16px',
            offsetY: 0,
            labels: {
                colors: '#353535',
            },
            markers: {
                width: 10,
                height: 10,
                radius: 15,
            },
            itemMargin: {
                vertical: 0
            },
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            style: {
                fontSize: '15px',
                fontFamily: 'Poppins, sans-serif',
            },
            y: {
                formatter: function (val) {
                    return val;
                }
            }
        }
    }

    var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
    chart5.render();
    
    Highcharts.chart('chartx', {
        title: {
            text: ''
        },
        series: [{
            type: 'pie',
            allowPointSelect: true,
            keys: ['name', 'y', 'selected', 'sliced'],
            data: [
                   
                        ['Kapak', <?=$kapak ?>, false],
                        ['Pisau', <?=$pisau?>, false]
                    
                
            ],
            showInLegend: true
        }]
    });
    
</script> --}}
@endsection
@endsection