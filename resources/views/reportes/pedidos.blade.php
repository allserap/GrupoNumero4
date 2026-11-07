@extends('layouts.app')
@section('title', 'Reporte de pedidos')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Reporte de todos los pedidos</h1>
    <button onclick="window.print()" class="btn btn-outline-secondary btn-sm d-print-none">Imprimir / PDF</button>
</div>
<p class="text-muted">Generado el {{ now()->format('d/m/Y H:i') }}</p>
<hr>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr><th>ID</th><th>Cliente</th><th>Descripción</th><th>Fecha</th><th class="text-end">Total</th></tr>
    </thead>
    <tbody>
        @forelse ($pedidos as $p)
        <tr>
            <td>{{ $p->Id_Pedido }}</td>
            <td>{{ $p->cliente?->Nombre }} {{ $p->cliente?->Apellido }}</td>
            <td>{{ $p->Descripcion }}</td>
            <td>{{ \Carbon\Carbon::parse($p->Fecha_Pedido)->format('d/m/Y') }}</td>
            <td class="text-end">${{ number_format($p->Total, 2) }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">No hay pedidos registrados.</td></tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr class="fw-bold">
            <td colspan="4">Total de pedidos: {{ $pedidos->count() }}</td>
            <td class="text-end">${{ number_format($pedidos->sum('Total'), 2) }}</td>
        </tr>
    </tfoot>
</table>
@endsection