@extends('app.layouts.app')

@section('title','Colaboradores')
@section('content')
    <h2>Colaboradores registrados</h2>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    <br>
    <div>
        <a href="{{ route('create_worker') }}">Crear nuevo</a>
    </div>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
        @php($count = 1)
        @foreach($workers as $worker)
        <tr>
        
            <td>{{$count++}}</td>
            <td>{{$worker->name}}</td>
            <td>{{$worker->email}}</td>
            <td>{{$worker->phone}}</td>
            <td><a href="{{ route('edit_worker',  $worker) }}">Editar</a></td>
            <form action="{{ route('delete_worker', $worker) }}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Eliminar</button></td>
            </form>
            
        </tr>
        @endforeach
    </table>
@endsection 