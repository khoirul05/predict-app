@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">				
            <div class="panel panel-headline">
		    	<div class="panel-heading">
		    		<h3 class="panel-title">LME ALUMINIUM HISTORICAL PRICE GRAPH</h3>
		    		<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
		    	</div>
		    	<div class="panel-body">
    
		    		<div class="row">
		    			<div class="col-md-12">
		    				<div id="chartDash"></div>
                        </div>
		    		</div>
		    	</div>
			</div>
            <div class="row">
				<div class="col-md-6">
					<!-- TABLE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">LME ALUMINIUM OFFICIAL PRICES, US$ PER TONNE</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Contract</th>
										<th>BID (US$ / TONNE)</th>
										<th>OFFER (US$ PER TONNE)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Cash</td>
										<td>2010.00</td>
										<td>2010.00</td>
									</tr>
									<tr>
										<td>3-months</td>
										<td>2027.50</td>
										<td>2027.50</td>
									</tr>
									<tr>
										<td>Aug 21</td>
										<td>2062.50</td>
										<td>2062.50</td>
									</tr>
                                    <tr>
										<td>Dec 21</td>
										<td>2108.50</td>
										<td>2108.00</td>
                                    </tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END RECENT PURCHASES -->
				</div>
				<div class="col-md-6">
					<!-- MULTI CHARTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">LME ALUMINIUM OFFICIAL PRICES CURVE</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<div id="chartDash2"></div>
                        </div>
					</div>
					<!-- END MULTI CHARTS -->
				</div>
			</div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartDash', {
        chart: {
            type: ''
        },
        title: {
            text: ''
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'US$ per tonne'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' US$ per tonne'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Aluminium',
            data: {!!json_encode($aluminium)!!}
        }]
    });
</script>

<script>
    Highcharts.chart('chartDash2', {
        chart: {
            type: ''
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ["Cash","3-months","D1","D2"],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'US$ per tonne'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ' US$ per tonne'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Bid',
            data: [2010.00,2027.50,2062.50,2108.50]
        }, {
            name: 'Offer',
            data: [2010.00,2027.50,2062.50,2108.50]
        }]
    });
</script>
@stop