@extends('app.layouts.app')

@section('title','Conductores')
@section('content')
    <h2>Conductores registrados</h2>
    @if($message = Session::get('info'))
        <span style="color:green">{{$message}}</span>
    @endif
    <div>
        <a href="{{ route('create_driver') }}">Crear nuevo</a>
    </div>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Tarifa por Km</th>
            <th>Acciones</th>
        </tr>
        @php($count = 1)
        @foreach($drivers as $driver)
        <tr>
        
            <td>{{$count++}}</td>
            <td>{{$driver->name}}</td>
            <td>{{$driver->dni}}</td>
            <td> L. {{$driver->fee}}</td>
            <td><a href="{{ route('edit_driver',  $driver) }}">Editar</a></td>
            <form action="{{ route('delete_driver', $driver) }}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Eliminar</button></td>
            </form>
            
        </tr>
        @endforeach
    </table>
@endsection 
