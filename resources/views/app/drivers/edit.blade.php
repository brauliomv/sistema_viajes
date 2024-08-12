@extends('app.layouts.app')

@section('title','Editar')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar información de conductor</h1>
    <a href="{{ route('show_drivers') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>

<div class="d-flex justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-10">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="p-5">
                        <form class="user" action="{{ route('update_driver', $driver) }}" method="POST">@csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="name"><strong>Nombre</strong></label>
                                    <input type="text" class="form-control bg-light  " name="name" id="name" value="{{$driver->name}}">
                                    @error('name')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="dni"><strong>DNI</strong></label>
                                            <input type="text" class="form-control bg-light  " name="dni" id="dni" value="{{$driver->dni}}">
                                            @error('dni')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="fee"><strong>Tarifa por Km (L.)</strong></label>
                                            <input type="text" class="form-control bg-light  " name="fee" id="fee" value="{{$driver->fee}}">
                                            @error('fee')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                            </div>
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
        </div>
    </div>
</div>
@endsection
