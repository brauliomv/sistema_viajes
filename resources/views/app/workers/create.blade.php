@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Crear nuevo colaborador</h2>
   
    <div class="back">
        <a href="{{ route('show_workers') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('store_worker') }}" method="POST">@csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="dni">Dni</label>
            <input type="text" name="dni" id="dni">
        </div>
        @error('dni')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone">
        </div>
        @error('phone')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection    