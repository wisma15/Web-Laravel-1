@extends('layout/main')

@section('title', 'Statisik')


@section('container')

    <!-- body -->
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Statistik Data Mahasiswa</h1>
            </div>
        </div>

        <div class="row">
            <div id="chartstatistik"></div>

        </div>

        <div class="row">
            <h1 class="mt-4">Frekuensi nilai mahasiswa</h1 class="mt-4">

            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nilai</th>
                        <th scope="col">Frekuensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($frq as $nilai)
                        <tr>
                            <td> {{ $nilai->nilai }} </td>
                            <td> {{ $nilai->frq }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection

<!-- chart -->
@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartstatistik', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Statistik'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Nilai Min',
                data: [{{ $min }}]

            }, {
                name: 'Nilai Max',
                data: [{{ $max }}]
            }, {
                name: 'Total Nilai',
                data: [{{ $totalskor }}]
            }, {
                name: 'Rata-rata',
                data: [{{ $avg }}]

            }, {
                name: 'Total Frekuensi',
                data: [{{ $totalfrekuensi }}]

            }]
        });

    </script>
@endsection
