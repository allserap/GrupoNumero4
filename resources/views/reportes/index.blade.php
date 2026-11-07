@extends('layouts.app')
@section('title', 'Reportes')

@section('content')
<h1>Reportes</h1>
<hr>
<div class="row g-3">
    <div class="col-md-4">
        <div class="card card-sadu p-4 h-100">
            <h5 class="text-sadu">Pedidos por cliente</h5>
            <p class="text-muted">Seleccione un cliente y vea todos sus pedidos.</p>
            <a href="{{ route('reportes.pedidos_cliente') }}" class="btn btn-sadu-primary mt-auto">Abrir</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-sadu p-4 h-100">
            <h5 class="text-sadu">Todos los pedidos</h5>
            <p class="text-muted">Listado completo de pedidos.</p>
            <a href="{{ route('reportes.pedidos') }}" class="btn btn-sadu-primary mt-auto">Abrir</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-sadu p-4 h-100">
            <h5 class="text-sadu">Todos los clientes</h5>
            <p class="text-muted">Listado completo de clientes.</p>
            <a href="{{ route('reportes.clientes') }}" class="btn btn-sadu-primary mt-auto">Abrir</a>
        </div>
    </div>
</div>
@endsection