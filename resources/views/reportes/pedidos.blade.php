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
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Pedido</th>
                <th>Fecha Entrega</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidos as $p)
                <tr>
                    <td>{{ $p->Id_Pedido }}</td>
                    <td>{{ $p->cliente?->Nombre }} {{ $p->cliente?->Apellido }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->FechaPedido)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->FechaEntrega)->format('d/m/Y H:i') }}</td>
                    <td>{{ $p->Observaciones }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay pedidos registrados.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="fw-bold">
                <td colspan="5">Total de pedidos: {{ $pedidos->count() }}</td>
            </tr>
        </tfoot>
    </table>
@endsection