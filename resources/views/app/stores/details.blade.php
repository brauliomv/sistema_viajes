@extends('app.layouts.app')

@section('title','Administrar')
@section('content')
    <p>Registrar distancias a colaboradores asignados para: {{ $store->name }}<p>
    @if($message = Session::get('success'))
        <span style="color:green">{{$message}}</span>
    @endif
    @if($message = Session::get('error'))
        <span style="color:red">{{$message}}</span>
    @endif
    <div class="back">
        <a href="{{ route('show_stores') }}">Regresar</a>
    </div>
    <br>

        <div class="form-group">
            <label for="phone">Teléfono: </label>
            <strong name="name">{{ $store->phone }}</strong>
        </div>
        @error('phone')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        <div class="form-group">
            <label for="email">Correo electrónico: </label>
            <strong name="name">{{ $store->email }}</strong>
        </div>
        @error('email')
            <small style="color:red">{{$message}}</small>
        @enderror
        <br>
        @php
            $count = 1;
        @endphp
        <form action="{{ route('store_distance', $store) }}" method="post">@csrf
        @method('PATCH')
            <table>
                <tr>
                    <th>No.</th>
                    <th>Colaborador</th>
                    <th>Distancia Domicilio/Sucursal</th>
                   
                </tr>
                @foreach ($store->workers as $worker )
                <tr>
                    <td>{{ $count++ }}</td>
                    <td> {{ $worker->name }}</td>
                        @method('PATCH')
                         <input type="hidden" name="workers[ {{ $worker->id }} ][id]" value="{{ $worker->id }}">
                         <td><input type="text" name="workers[ {{ $worker->id }} ][distance]" id="distance" value="{{ $worker->pivot->distance ?? '' }}"> Km</td>  
                </tr>
                @endforeach
            </table>
            <br>
            <button type="submit">Guardar</button>
            </form>
            @error('workers')
            <small style="color:red">{{$message}}</small>
            @enderror
            <br> 
@endsection    