@extends('app.layouts.app')

@section('title','Usuarios')
@section('content')
    <h2>Usuarios registrados</h2>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    @if($message = Session::get('error'))
        <span style="color:red">{{$message}}</span>
    @endif
    <br>
    <div>
        <a href="{{ route('create_user') }}">Crear nuevo</a>
    </div>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        @php($count = 1)
        @foreach($users as $user)
        <tr>
        
            <td>{{$count++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <!-- <td><a href="{{ route('edit_user',  $user) }}">Editar</a></td> -->
            <form action="{{ route('delete_user', $user) }}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Eliminar</button></td>
            </form>
            
        </tr>
        @endforeach
    </table>
@endsection 