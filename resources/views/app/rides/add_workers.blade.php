@extends('app.layouts.app')

@section('title','Agregar')
@section('content')
    <h2>Agregar colaboradores</h2>
   
    <div class="back">
        <a href="{{ route('create_ride') }}">Regresar</a>
    </div>
    <br>
    <h3>{{ $store->name }}</h3>
    <form action="{{ route('store_ride') }}" method="POST">@csrf
        <input name="store" id="store" type="hidden" value="{{ $store->id }}">
        <div class="form-group">
            <label for="store">Seleccionar conductor:</label>
            <select name="driver" id="driver">
                @foreach ($drivers as $driver)
                  <option value="{{ $driver->id }}">{{$driver->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="store">Seleccionar colaboradores que viajarán:</label>
            <select name="workers[]" id="workers" multiple>
                @foreach ($workers as $worker)
                  <option value="{{ $worker->id}}">{{$worker->name}} - {{$worker->pivot->distance}}   Km </option>
                  
                @endforeach
            </select>
        </div>
        @error('worker')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <br>
        <button type="submit">Continuar</button>
    </form>
@endsection   