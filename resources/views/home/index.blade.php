@extends('home.layouts.main')
@include('home.layouts.navbar')
@section('content')
<script src="/high-chart-lib/highcharts.js"></script>
<script src="/high-chart-lib/highcharts-3d.js"></script>
<script src="/high-chart-lib/modules/exporting.js"></script>
<script src="/high-chart-lib/modules/export-data.js"></script>
<script src="/high-chart-lib/modules/accessibility.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<div id="male" data-male="{{ $dataGenderMale }}"></div>
<div id="female" data-female="{{ $dataGenderFemale }}"></div>

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
                <p class="highcharts-description">
                    Chart designed to highlight 3D column chart rendering options.
                    Move the sliders below to change the basic 3D settings for the chart.
                    3D column charts are generally harder to read than 2D charts, but provide
                    an interesting visual effect.
                </p>
                <div id="sliders">
                    <table>
                        <tr>
                            <td><label for="alpha">Alpha Angle</label></td>
                            <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
                        </tr>
                        <tr>
                            <td><label for="beta">Beta Angle</label></td>
                            <td><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></td>
                        </tr>
                        <tr>
                            <td><label for="depth">Depth</label></td>
                            <td><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></td>
                        </tr>
                    </table>
                </div>
            </figure>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    Highcharts.chart('container1', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Grafik data umur'
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
        name: 'Delivered amount',
        data: [
            ['< 30', 8],
            ['30-40', 3],
            ['40-50', 1],
            ['> 50', 6],
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
        text: 'Grafik data gender'
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
        name: 'Delivered amount',
        data: [
            ['Laki-laki', parseInt(male)],
            ['Perempuan', parseInt(female)],
        ]
    }]
});
</script>

<script type="text/javascript">
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Chart rotation demo'
        },
        subtitle: {
            text: 'Test options by dragging the sliders below'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });
    
    function showValues() {
        $('#alpha-value').html(chart.options.chart.options3d.alpha);
        $('#beta-value').html(chart.options.chart.options3d.beta);
        $('#depth-value').html(chart.options.chart.options3d.depth);
    }
    
    // Activate the sliders
    $('#sliders input').on('input change', function () {
        chart.options.chart.options3d[this.id] = parseFloat(this.value);
        showValues();
        chart.redraw(false);
    });
    
    showValues();
</script>



@endsection