@extends('app.layouts.app')

@section('title','Reportes')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Generar reportes</h1>
    <a href="{{ route('welcome') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-alt-circle-left text-white-50"></i> Regresar</a>
</div>

<div class="d-flex justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-10">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                @if($message = Session::get('error'))
                    <span style="color:red">{{$message}}</span>
                @endif
                <div class="col-xl-10">
                    <div class="p-5">
                        <form class="user" action="{{ route('generate_report') }}" method="GET">@csrf
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="driver"><strong>Seleccionar conductor</strong></label>
                                    <select class="custom-select  form-control bg-light" name="driver" id="driver">
                                        @foreach ($drivers as $driver )
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('driver')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="start-date"><strong>Desde:</strong></label>
                                            <input type="date" class="form-control bg-light  " name="start-date" id="start-date">
                                            @error('start-date')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="end-date"><strong>Hasta:</strong></label>
                                            <input type="date" class="form-control bg-light  " name="end-date" id="end-date">
                                            @error('end-date')
                                                <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" href="#" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-rocket"></i>
                                    </span>
                                    <span class="text">Generar reporte</span>
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

