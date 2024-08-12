@extends('app.layouts.app')

@section('title','Nuevo')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registrar nuevo viaje</h1>
    <a href="{{ route('show_rides') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>

<div class="d-flex justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-10">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="p-5">
                        <form class="user" action="{{ route('asign_workers') }}" method="POST">@csrf
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="name"><strong>Seleccionar sucursal donde será el punto de partida</strong></label>
                                    <select class="custom-select  form-control bg-light" name="store" id="store">
                                        @foreach ($stores as $store )
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('store')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="form-group">
                                <button type="submit" href="#" class="btn btn-success btn-icon-split">
                                    <span class="text">Siguiente</span>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
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

