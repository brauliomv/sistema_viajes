@extends('app.layouts.app')

@section('title','Reportes')
@section('content')
    <h2>Generar reporte de viajes</h2>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    @if($message = Session::get('error'))
        <span style="color:red">{{$message}}</span>
    @endif
    <div class="parameters">
        <div class="param-title">
            <p>Ingresar parámetros de búsqueda</p>
        </div>
        @error('driver')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        @error('start-date')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        @error('end-date')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <form action="{{route('generate_report')}}" id="reportForm" method="get">
            <div class="param-body">
                <div class="driver">
                    <label for="driver">Seleccionar conductor:</label>
                    <select name="driver" id="driver">
                        @foreach ($drivers as $driver )
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach  
                    </select>    
                </div>
                <div class="start-date">
                    <label for="start-date">Desde:</label>
                    <input type="date" name="start-date" id="start-date"> 
                </div>
                
                <div class="end-date">
                    <label for="end-date">Hasta:</label>
                    <input type="date" name="end-date" id="end-date">   
                </div>
                <div class="generate">             
                    <button type="submit">Generar reporte</button>
                </div>
            </div>
        </form>
    </div>
@endsection 