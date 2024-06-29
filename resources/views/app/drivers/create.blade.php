@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Create a new driver</h2>
   
    <div class="back">
        <a href="{{ route('show_drivers') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('store_driver') }}" method="POST">@csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="dni">DNI Conductor</label>
            <input type="text" name="dni" id="dni" value="{{ old('dni') }}">
        </div>
        @error('dni')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection    