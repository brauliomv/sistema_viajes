@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Editar usuario</h2>
    @if($message = Session::get('info'))
        <span style="color:blue">{{$message}}</span>
    @endif
    <br>
    <div class="back">
        <a href="{{ route('show_users') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('update_user', $user) }}" method="POST">@csrf
     @method('PATCH')       
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        @error('email')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="{{ $user->password }}">
        </div>
        @error('password')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="role_id">Asignar rol</label>
            <select name="role_id" id="">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{$user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @error('role_id')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection    