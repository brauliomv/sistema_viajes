@extends('app.layouts.app')

@section('title','Administrar')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sucursales</strong></h1>
    <a href="{{ route('show_stores') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 ">Registrar distancias a colaboradores asignados para: {{ $store->name }}</h6>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('store_distance', $store) }}" method="post">@csrf
            @method('PATCH')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Distancia Domicilio/Sucursal</th>                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Distancia Domicilio/Sucursal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($count = 1)
                        @foreach($store->workers as $worker)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$worker->name }}</td>
                                @method('PATCH')
                                <input type="hidden" name="workers[ {{ $worker->id }} ][id]" value="{{ $worker->id }}">
                                <td>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control bg-light" name="workers[ {{ $worker->id }} ][distance]" id="distance" value="{{ $worker->pivot->distance ?? '' }}">
                                        </div>
                                        Km
                                    </div>
                                </td> 
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <button type="submit" href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection    

