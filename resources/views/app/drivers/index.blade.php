@extends('app.layouts.app')

@section('title','Conductores')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Conductores</strong></h1>
    <a href="{{ route('create_driver') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Nuevo conductor</a>
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
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Tarifa por km</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Tarifa por km</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php($count = 1)
                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->dni}}</td>
                            <td>L. {{$driver->fee}}</td>
                            <td>
                            
                                <div class="d-inline">
                                    <a href="{{ route('edit_driver',  $driver) }}" class="btn btn-warning btn-circle btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        
                                    </a>
                                    |                            
                                    <form action="{{ route('delete_driver', $driver) }}" class="d-inline" class="mx-1" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"  class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
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


