@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Editar sucursal</h2>
   
    <div class="back">
        <a href="{{ route('show_stores') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('update_store', $store) }}" method="POST">@csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{$store->name}}">
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" value="{{$store->phone}}">
        </div>
        @error('phone')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{$store->email}}">
        </div>
        @error('email')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="">Asignar colaboradores</label>
            <select name="workers[]" id="workers[]" multiple>
                @foreach ($workers as $worker )
                     <option value="{{ $worker->id }}"  {{$store->workers->contains($worker) ? 'selected' : ''}} >{{ $worker->name }}</option>
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