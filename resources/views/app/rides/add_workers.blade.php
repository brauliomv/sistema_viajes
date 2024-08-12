@extends('app.layouts.app')

@section('title','Agregar')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar colaboradores</h1>
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
                    <h3>{{ $store->name }}</h3>
                        <form class="user" action="{{ route('store_ride') }}" method="POST">@csrf
                            <input name="store" id="store" type="hidden" value="{{ $store->id }}">
                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="driver">Seleccionar conductor</label>
                                    <select name="driver" id="driver">
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{$driver->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('driver')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>    
                            </div>


                            <div class="form-group">
                                <div class="d-flex flex-column">
                                    <label for="workers">Seleccionar colaboradores</label>
                                    <select class="custom-select  form-control bg-light" name="workers[]" id="workers" multiple>
                                        @foreach ($workers as $worker )
                                            <option value="{{ $worker->id }}">{{$worker->name}} - {{$worker->pivot->distance}}   Km </option>
                                        @endforeach
                                    </select>
                                    @error('worker')
                                        <small style="color:red">{{$message}}</small>
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

