<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }

    :root{
    
        --color2:#fcf7f8;
        --color3:#004e98;
        --color4:#f0f1f3;
    }

    .report{
       display: flex;
       justify-content: center;
    }

    .report-content{
        margin-top: 3em;
        display: flex;
        justify-content: center;
    }
    .content{
        margin-bottom: 3em;
        opacity: 60%;
        border: #004e98 solid 1px;
        padding: 1.1em;
        border-radius: 0.2em;
    }
    .report-title{
        text-align: center;
        font-weight: bold;
        font-size: 2em;
        color: #004e98;
    }


    table{
        
        text-align: center;
        border-collapse: collapse;
    }

    .index{
        width: 5em;
    }

    .worker-name{
        width: 36em;
    }

    .ride-date, .ride-distance{
        width: 18.4em;
    }

    .workers-table th, td{  
        border: solid 1px #ced3dc;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .ride-header{
        display: flex;
        justify-content: center;
        
    }

    .ride-footer {
            text-align: justify;
            background: #004e98;
            border-radius: 0.2em;
            
        }
        
    .ride-footer:after {
        content: '';
        display: inline-block;
        width: 100%;
    }
    
    .ride-footer > div {
        display: inline-block;
        width: 49%; /* Ajusta el ancho según sea necesario */
        vertical-align: top;
        
    } 
    
    .total-payment, .total-distance{
        text-align: center;
        font-size: 1.1em;
        font-weight: bold;
        color: #f0f1f3;
    }

    .total{
        margin-top: 2em;
        font-size: 1.3em;
    }
    
</style>
<body>
    <div class="report">
        <div class="report-title">
            <p>Reporte de viajes realizados </p>
        </div>
        <div class="driver">
            <p>Conductor asignado: <Strong>{{ $driver->name }}</Strong></p>
        </div>
            <div class="report-content">
                    @php
                        $rideCount = 1;
                    @endphp
                    @foreach ($rides as $ride )
                        <div class="content">
                            <div class="ride-header">
                                <table class="ride-header-table">
                                    <tr>
                                        <th>Viaje No.</th>
                                        <th class="ride-date">Fecha del viaje</th>
                                        <th class="ride-distance">Distancia del viaje</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $rideCount++ }}</td>
                                        <td class="ride-date">{{ $ride->created_at }}</td>
                                        <td class="ride-distance">{{ $ride->distance }} km</td>
                                    </tr>
                                </table> 
                            </div>
                            <p class="table-description">Colaboradores transportados:</p>  
                            <table class="workers-table">
                                
                                <tr>
                                    <th class="index">No.</th>
                                    <th class="worker-name">Colaborador</th>
                                </tr>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($ride->workers as $worker )   
                                        <tr>
                                            <td class="index">{{ $count++}}</td> 
                                            <td class="worker-name">{{ $worker->name }}</td> 
                                        </tr>
                                @endforeach
                            </table> 
                        </div>
                    @endforeach

                <div class="ride-footer">
                    <div class="total-distance">
                        <p>Distancia total recorrida: <br> <p class="total">{{$totalDistance}} km</p></p>
                    </div>
                    <div class="total-payment">
                        <p>Total a pagar por viajes realizados: <br> <p class="total">L. {{$payment}}</p></p>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>