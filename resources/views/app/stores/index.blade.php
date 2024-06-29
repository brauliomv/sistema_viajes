@extends('app.layouts.app')

@section('title','Sucursales')
@section('content')
    <h2>Sucursales</h2>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    <div>
        <a href="{{ route('create_store') }}">Crear nuevo</a>
    </div>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        @php($count = 1)
        @foreach($stores as $store)
        <tr>
        
            <td>{{$count++}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->phone}}</td>
            <td>{{$store->email}}</td>
            <td><a href="{{ route('edit_store',  $store) }}">Editar</a></td>
            <td><a href="{{ route('show_store',  $store) }}">Distancias</a></td>
            <form action="{{ route('delete_store', $store) }}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Eliminar</button></td>
            </form>
            
        </tr>
        @endforeach
    </table>
@endsection 
