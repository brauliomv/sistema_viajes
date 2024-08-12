@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detalles del viaje</h1>
    <a href="{{ route('show_rides') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>

<div class="d-flex justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-10">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="row"> 
                        <div class="col">
                             <p style="font-size: 1.2em;">Viaje >> <strong> ID: #{{ $ride->id }} </strong></p>
                             
                        </div>
                        <div class="col">
                            
                             <p style="font-size: 1.2em;">Fecha: <strong> {{$ride->created_at}} </strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="font-size: 1.1em;"> Conductor asignado: <strong>{{ $ride->driver->name }} </strong> </p>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Colaboradores transportados:</h6>
                        </div>
                        <table class="table" >
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                            </tr>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($ride->workers as $worker)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$worker->name}}</td>
                            </tr>
                            @endforeach
                        </table>
                    
                        <div class="row card-header" style="font-size: 1.3em;" >
                            <div class="col">
                                <center> <p >Distancia recorrida:  <br> <strong>{{$ride->distance}} km</p> </strong> </center>
                            </div>
                            <div class="col">
                            <center> <p>Total a pagar: <br> <strong> L. {{$ride->driver->fee * $ride->distance}} </p></strong>  </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    

