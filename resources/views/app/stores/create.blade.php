@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registrar nueva sucursal</h1>
    <a href="{{ route('show_stores') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>

<div class="d-flex justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-10">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="p-5">
                        <form class="user" action="{{ route('save_store') }}" method="POST">@csrf
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="name"><strong>Nombre</strong></label>
                                    <input type="text" class="form-control bg-light  " name="name" id="name">
                                    @error('name')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="phone"><strong>Teléfono</strong></label>
                                            <input type="text" class="form-control bg-light  " name="phone" id="phone">
                                            @error('phone')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="email"><strong>Correo electrónico</strong></label>
                                            <input type="email" class="form-control bg-light  " name="email" id="email">
                                            @error('email')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="name"><strong>Asignar colaboradores</strong></label>
                                    <select class="custom-select  form-control bg-light" name="workers[]" id="workers[]" multiple>
                                        @foreach ($workers as $worker )
                                            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('workers')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
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