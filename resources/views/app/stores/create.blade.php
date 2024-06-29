@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Registrar nueva sucursal</h2>
   
    <div class="back">
        <a href="{{ route('show_stores') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('save_store') }}" method="POST">@csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>
        @error('name')
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
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email">
        </div>
        @error('email')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="">Asignar colaboradores</label>
            <select name="workers[]" id="workers[]" multiple>
                @foreach ($workers as $worker )
                     <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>
        @error('workers')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
      
        <button type="submit">Guardar</button>
    </form>
@endsection    