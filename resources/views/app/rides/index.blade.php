@extends('app.layouts.app')

@section('title','Sucursales')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Viajes realizados</strong></h1>
    <a href="{{ route('create_ride') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Nuevo viaje</a>
</div>
    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registros</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Conductor</th>
                        <th>Distancia del recorrido</th>
                        <th>Creado por</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Conductor</th>
                        <th>Distancia del recorrido</th>
                        <th>Creado por</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($count = 1)
                    @foreach($rides as $ride)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$ride->driver->name}}</td>
                            <td>{{$ride->distance}} km</td>
                            <td>{{$ride->user->name}}</td>
                            <td>                        
                                <div class="d-inline">
                                    <a href="{{route('ride_details', $ride)}}" class="btn btn-info btn-circle btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info"></i>
                                        </span> 
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 

