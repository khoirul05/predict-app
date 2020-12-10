@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">				
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Hasil Prediksi</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Aluminium Cash</th>
                                            <th>Aluminium</th>
                                            <th>Alumina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataset as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->aluminium_cash}}</td>
                                            <td>{{$data->aluminium}}</td>
                                            <td>{{$data->alumina}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="col-md-8">
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Grafik Harga</h3>
							<p class="panel-subtitle">Period: Aug 02, 2020 - Aug 11, 2020</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">274,678</span>
											<span class="title">Visits</span>
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">35%</span>
											<span class="title">Conversions</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<div id="chartNilai"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary">
										<span class="number">--</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> -%</span>
										<span class="info-label">Aluminium Cash</span>
									</div>
									<div class="weekly-summary">
										<span class="number">--</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> -%</span>
										<span class="info-label">Aluminium</span>
									</div>
									<div class="weekly-summary">
										<span class="number">--</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> -%</span>
										<span class="info-label">Alumina</span>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Prediksi Aluminium Cash</h3>
							<p class="panel-subtitle">Period: Aug 02, 2020 - Aug 11, 2020</p>
						</div>
						<div class="panel-body">
							<div class="row">
			
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="chartTest"></div>
								</div>
							</div>
						</div>
					</div>
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Prediksi Aluminium</h3>
							<p class="panel-subtitle">Period: Aug 02, 2020 - Aug 11, 2020</p>
						</div>
						<div class="panel-body">
							<div class="row">
			
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="chartAluminium"></div>
								</div>
							</div>
						</div>
					</div>
                    <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Prediksi Aluminina</h3>
							<p class="panel-subtitle">Period: Aug 02, 2020 - Aug 11, 2020</p>
						</div>
						<div class="panel-body">
							<div class="row">
			
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="chartAlumina"></div>
								</div>
							</div>
						</div>
					</div>
                </div>           
            </div>
        </div>
</div>
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Prediksi Harga'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Harga $'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
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
            name: 'Aluminium Cash',
            data: {!!json_encode($aluminium_cash)!!}

        }, {
            name: 'Aluminium',
            data: {!!json_encode($aluminium)!!}

        }, {
            name: 'Alumina',
            data: {!!json_encode($alumina)!!}
        }]
    });
</script>

<script>
    Highcharts.chart('chartTest', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Prediksi Harga'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Harga $'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
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
            name: 'Aluminium Cash',
            data: {!!json_encode($aluminium_cash)!!}

        }]
    });
</script>

<script>
    Highcharts.chart('chartAluminium', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Prediksi Harga'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Harga $'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
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
            name: 'Aluminium',
            data: {!!json_encode($aluminium)!!}

        }]
    });
</script>

<script>
    Highcharts.chart('chartAlumina', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Prediksi Harga'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Harga $'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
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
            name: 'Aluminina',
            data: {!!json_encode($alumina)!!}
        }]
    });
</script>

@stop