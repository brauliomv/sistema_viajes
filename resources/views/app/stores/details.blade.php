@extends('app.layouts.app')

@section('title','Administrar')
@section('content')
    <h2>Asignar distancias a colaboradores</h2>
   
    <div class="back">
        <a href="{{ route('show_stores') }}">Regresar</a>
    </div>
    <br>
        <div class="form-group">
            <label for="name">Nombre: </label>
            <strong name="name">{{ $store->name }}</strong>
        </div>
        <div class="form-group">
            <label for="name">ID: </label>
            <strong name="name">{{ $store->id }}</strong>
        </div>
        @error('name')
            <small style="color:red">{{$message}}</small>
        @enderror
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
                    <td><input type="number" name="distance[{{ $worker->id }}]" id="distance"> Km</td>
                </tr>
                @endforeach
            </table>
            @error('workers')
            <small style="color:red">{{$message}}</small>
            @enderror
            <br>
            <button type="submit">Guardar</button>
        </form>
        
@endsection    