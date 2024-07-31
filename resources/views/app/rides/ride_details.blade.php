@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Detalles del viaje</h2>
   
    <div class="back">
        <a href="{{ route('show_rides') }}">Regresar</a>
    </div>
    <br>
    <div class="card">
        <div class="card-content">
            <div class="card-head">
                <div class="ride-id">
                    <p> <strong>Viaje No.</strong> {{ $ride->id }}</p>
                </div>
                <div class="ride-date">
                    <p><strong>Fecha del viaje:</strong> {{$ride->created_at}}</p>
                </div>
            </div>
            <div class="card-body">
                <div class="driver">
                    <p><strong>Conductor asignado:</strong> {{ $ride->driver->name }}</p>
                </div>
                <div class="workers">
                    <p><strong>Colaboradores transportados:</strong></p>
                    <table class="workers-table">
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
                </div>
                <div class="distance">
                    <p><strong>Distancia recorrida:</strong> {{$ride->distance}} km</p>
                </div>
                
            </div>
            <div class="payout">
                 <p>Total: L. {{$ride->driver->fee * $ride->distance}} </p>
            </div>
        </div>
    </div>
@endsection    