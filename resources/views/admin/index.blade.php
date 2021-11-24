@extends('admin.layouts.main')
@include('admin.layouts.navbar')
@include('admin.layouts.sidenav')
@section('content')
<script src="/high-chart-lib/highcharts.js"></script>
<script src="/high-chart-lib/highcharts-3d.js"></script>
<script src="/high-chart-lib/modules/exporting.js"></script>
<script src="/high-chart-lib/modules/export-data.js"></script>
<script src="/high-chart-lib/modules/accessibility.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<div class="pcoded-content">
    <!-- Data Jenis Kelamin -->
    <div id="male" data-male="{{ $dataGenderMale }}"></div>
    <div id="female" data-female="{{ $dataGenderFemale }}"></div>
    <!-- Data Usia -->
    <div id="age1" data-lesser="{{ $dataLesserThan30 }}"></div>
    <div id="age2" data-more="{{ $dataMoreThan50 }}"></div>
    <div id="age3" data-three-four="{{ $dataAge3040 }}"></div>
    <div id="age4" data-four-five="{{ $dataAge4050 }}"></div>
    <!-- Data Eselon -->
    <div id="eselon1" data-eselona="{{ $eselon1 }}"></div>
    <div id="eselon2" data-eselonb="{{ $eselon2 }}"></div>
    <div id="eselon3" data-eselonc="{{ $eselon3 }}"></div>
    <div id="eselon4" data-eselond="{{ $eselon4 }}"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container1"></div>
                    <p class="highcharts-description text-center">
                        Data umur
                    </p>
                </figure>
            </div>
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container2"></div>
                    <p class="highcharts-description text-center">
                        Data Gender
                    </p>
                </figure>
            </div>
            <div class="col-md">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const age1 = document.getElementById('age1').getAttribute('data-lesser');
    const age2 = document.getElementById('age2').getAttribute('data-more');
    const age3 = document.getElementById('age3').getAttribute('data-three-four');
    const age4 = document.getElementById('age4').getAttribute('data-four-five');

    Highcharts.chart('container1', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Grafik Data Umur'
        },
        subtitle: {
            text: 'Data umur dalam grafik'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Jumlah ',
            data: [
                ['Dibawah 30', parseInt(age1)],
                ['30-40', parseInt(age3)],
                ['40-50', parseInt(age4)],
                ['Diatas 50', parseInt(age2)],
            ]
        }]
    });
</script>

<script type="text/javascript">
    const male = document.getElementById('male').getAttribute('data-male');
    const female = document.getElementById('female').getAttribute('data-female');
    Highcharts.chart('container2', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Grafik Data Jenis Kelamin'
        },
        subtitle: {
            text: 'Data gender dalam grafik'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
                ['Laki-laki', parseInt(male)],
                ['Perempuan', parseInt(female)],
            ]
        }]
    });
</script>

<script type="text/javascript">
    const eselon1 = document.getElementById('eselon1').getAttribute('data-eselona');
    const eselon2 = document.getElementById('eselon2').getAttribute('data-eselonb');
    const eselon3 = document.getElementById('eselon3').getAttribute('data-eselonc');
    const eselon4 = document.getElementById('eselon4').getAttribute('data-eselond');

    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 0,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Data Eselon'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
                name: 'I',
                data: [
                    ['Eselon I', parseInt(eselon1)],
                ]
            },
            {
                name: 'II',
                data: [
                    ['Eselon II', parseInt(eselon2)],
                ]
            },
            {
                name: 'III',
                data: [
                    ['Eselon III', parseInt(eselon3)],
                ]
            },
            {
                name: 'Eselon IV',
                data: [
                    ['Eselon IV', parseInt(eselon4)],
                ]
            },
        ]
    });
</script>
@endsection