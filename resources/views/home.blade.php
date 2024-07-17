@extends('core')
@section('title',('Home'))
@section('content')
<div class="min-height-200px">
    <div class="row">
        <div class="col-xl-6 mb-30">
            <div class="card-box height-100-p pd-20">
                <img src="{{'/'}}images/depress.jpg"  alt="">
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <div class="card-box height-100-p pd-20">
                <img src="{{'/'}}images/depressred.jpg"  alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Mengenal Depresi</h2>
                <p>
                    Depresi adalah gangguan suasana hati (mood) yang ditandai dengan perasaan sedih yang mendalam dan kehilangan minat terhadap hal-hal yang disukai. Seseorang dinyatakan mengalami depresi jika sudah 2 minggu merasa sedih, putus harapan, atau tidak berharga.

                    Depresi yang dibiarkan terus berlanjut dan tidak mendapatkan penanganan dapat menyebabkan terjadinya penurunan produktifitas kerja, gangguan hubungan sosial, hingga munculnya keinginan untuk bunuh diri.
                </p>
                <span style="font-weight: bold">Gejala </span>
                <p>
                    Seseorang yang depresi umumnya menunjukkan ciri-ciri psikologi dan fisik tertentu. Ciri psikologis orang yang depresi adalah rasa cemas dan khawatir yang berlebihan, emosi yang tidak stabil, serta rasa putus asa atau frustrasi.

                    Sementara itu, ciri-ciri fisik pada seseorang yang depresi adalah selalu merasa lelah dan tak bertenaga, pusing dan nyeri tanpa penyebab yang jelas, serta menurunnya selera makan.
                </p>
                <span style="font-weight: bold">Penyebab </span>
                <p>
                    Depresi lebih sering dialami oleh orang dewasa. Penyebabnya diduga terkait dengan faktor genetik, hormon, dan zat kimia di otak. Beberapa faktor pemicu depresi antara lain:
                </p>
                <ul style="margin-left:20px">

                    <li>1. Peristiwa traumatis</li>
                    <li>2. Tekanan batin, misalnya karena masalah keuangan atau masalah rumah tangga</li>
                    <li>3. Pola pikir yang salah, seperti toxic positivity</li>
                    <li>4. Hilangnya kegiatan atau tujuan hidup setelah pensiun (post power syndrome)</li>
                </ul>
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