@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Crear nuevo usuario</h2>
   
    <div class="back">
        <a href="{{ route('show_users') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('store_user') }}" method="POST">@csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email">
        </div>
        @error('email')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
        </div>
        @error('password')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="role">Asignar rol</label>
            <select name="role_id" id="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @error('role')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection    