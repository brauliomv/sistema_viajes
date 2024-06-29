@extends('app.layouts.app')

@section('title','Editar')
@section('content')
    <h2>Editar colaborador</h2>
   
    <div class="back">
        <a href="{{ route('show_workers') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('update_worker',$worker) }}" method="POST">@csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $worker->name }}">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="dni">Dni</label>
            <input type="text" name="dni" id="dni" value="{{ $worker->dni }}">
        </div>
        @error('dni')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" value="{{ $worker->phone }}">
        </div>
        @error('phone')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection    