@extends('app.layouts.app')

@section('title','Sucursales')
@section('content')
    <h2>Viajes registrados</h2>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    @if($message = Session::get('error'))
        <span style="color:red">{{$message}}</span>
    @endif
    @if (Auth::user()->role->name == 'Gerente de tienda')
        <div>
            <a href="{{ route('create_ride') }}">Crear nuevo</a>
        </div>
    @endif
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Conductor</th>
            <th>Distancia del recorrido</th>
            <th>Creado por</th>
            <th>Acciones</th>
        </tr>
        @php($count = 1)
        @foreach($rides as $ride)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$ride->driver->name}}</td>
            <td>{{$ride->distance}} km</td>
            <td>{{$ride->user->name}}</td>
            <td><a href="{{route('ride_details', $ride)}}">Detalles</a></td>     
        </tr>
        @endforeach
    </table>
@endsection 