
@extends('app.layouts.app')
@section('title','Inicio')
@section('content')
<div class="wrapper">
    <div class="content">
        <h1>Sistema de gestión de viajes</h1>
        <span class="greeting">Bienvenido <strong>{{ Auth::user()->name }}!</strong></span>
    </div>
</div>
@endsection