@extends('layouts.app')
@section('title', 'Reporte de clientes')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Reporte de todos los clientes</h1>
    <button onclick="window.print()" class="btn btn-outline-secondary btn-sm d-print-none">Imprimir / PDF</button>
</div>
<p class="text-muted">Generado el {{ now()->format('d/m/Y H:i') }}</p>
<hr>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Fecha de nacimiento</th></tr>
    </thead>
    <tbody>
        @forelse ($clientes as $c)
        <tr>
            <td>{{ $c->Id_Cliente }}</td>
            <td>{{ $c->Nombre }}</td>
            <td>{{ $c->Apellido }}</td>
            <td>{{ \Carbon\Carbon::parse($c->Fecha_Nac)->format('d/m/Y') }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No hay clientes registrados.</td></tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="fw-bold"><td colspan="4">Total de clientes: {{ $clientes->count() }}</td></tr>
    </tfoot>
</table>
@endsection