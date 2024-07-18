@extends('app.layouts.app')

@section('title','Editar')
@section('content')
<h2>Editar conductor</h2>
@if($message = Session::get('info'))
    <span style="color:blue">{{$message}}</span>
@endif
<div class="back">
    <a href="{{ route('show_drivers') }}">Regresar</a>
</div>
<br>
<form action="{{ route('update_driver',$driver) }}" method="POST">@csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{$driver->name}}">
    </div>
    @error('name')
        <small style="color:red">{{$message}}</small>
    @enderror
    <br>
    <div class="form-group">
        <label for="dni">DNI Conductor</label>
        <input type="text" name="dni" id="dni" value="{{$driver->dni}}">
    </div>
    @error('dni')
        <small style="color:red">{{$message}}</small>
    @enderror
    <br>
    <div class="form-group">
        <label for="fee">Tarifa por Kilómetro (Lps.)</label>
        <input type="text" name="fee" id="fee" value="{{ $driver->fee }}">
    </div>
    <br>
    @error('fee')
        <small style="color:red">{{$message}}</small>
    @enderror
    <button type="submit">Guardar</button>
</form>
@endsection