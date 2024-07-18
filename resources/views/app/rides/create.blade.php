@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
    <h2>Registrar viaje</h2>
   
    <div class="back">
        <a href="{{ route('show_rides') }}">Regresar</a>
    </div>
    <br>
    <form action="{{ route('asign_workers') }}" method="POST">@csrf
        <div class="form-group">
            <label for="store">Seleccionar sucursal</label>
            <select name="store" id="store">
                @foreach ($stores as $store)
                  <option value="{{ $store->id }}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        @error('store')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>


        @error('driver')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <button type="submit">Continuar</button>
    </form>
@endsection   