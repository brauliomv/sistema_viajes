<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Reporte</title>

		<style>

            .invoice-title{
                text-align: center;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                font-size: 25px;
            }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 40px;
				line-height: 45px;
				color: #333;
                width: 450px;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 10px;
                padding-top: 20px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

            .total-payment, .total-distance{
                font-size: 1.3em;
                font-weight: bold;
            }

            .pagenum:before {
                content: counter(page);
            }

            footer{
                text-align: center;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                margin-top:40px;
            }
		</style>
	</head>

	<body>
    <div class="invoice-title">
        <p>Historial de viajes realizados</p>
    </div>
		<div class="invoice-box">
            
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table >
							<tr>
								<td class="title">
                                    <img src="{{ public_path('admin_assets/img/logo3.jpg') }}" style="width: 10%; ">
                                    <strong>RideRegist</strong>
								</td>

								<td>
									Desde: {{ $startDate }} <br />
									Hasta: {{ $endDate}}
                                    
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									RideRegist.<br />
                                    Honduras, CA <br>
                                    Conductor: {{ $driver->name }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
                @php
                    $rideCount = 1;
                @endphp
                @foreach ($rides as $ride )
                <br>
                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        Viaje ID >> <strong>#{{ $ride->id }}</strong><br />
                                        Fecha: <strong>{{$ride->created_at }}</strong><br />
                                        Distancia: <strong>{{ $ride->distance }} km</strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                        @php
                            $count = 1;
                        @endphp
                        <tr class="heading">
                            <td>#</td>
                            <td>Colaborador</td>
                        </tr>
                        @foreach ($ride->workers as $worker)
                            <tr class="item">
                                <td>{{ $count++}}</td>
                                <td>{{ $worker->name }}</td>
                            </tr>
                        @endforeach
                    
                @endforeach
                <tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td >
                                    <center>
                                        Distancia total recorrida: <br>
                                        <p class="total-distance">{{$totalDistance}} km<</p>
                                    </center>
								</td>
								<td>
									<center>
                                        Total a pagar: <br>
                                        <p class="total-payment">L. {{$payment}}</p>
                                    </center>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
        <footer>
            Página <span class="pagenum"></span>
        </footer>
	</body>
</html>