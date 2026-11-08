@extends('layouts.app')
@section('title', 'Pedidos por cliente')

@section('content')
    <h1>Reporte de pedidos por cliente</h1>
    <hr>

    <form method="GET" action="{{ route('reportes.pedidos_cliente') }}" class="row g-2 align-items-end mb-4 d-print-none">
        <div class="col-md-6">
            <label for="Id_Cliente" class="form-label">Cliente</label>
            <select name="Id_Cliente" id="Id_Cliente" class="form-select" required>
                <option value="">-- Seleccione un cliente --</option>
                @foreach ($clientes as $c)
                    <option value="{{ $c->Id_Cliente }}" @selected(request('Id_Cliente') == $c->Id_Cliente)>
                        {{ $c->Nombre }} {{ $c->Apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-sadu-primary w-100">Generar reporte</button>
        </div>
    </form>

    @if ($cliente)
        <div class="card card-sadu p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Cliente: {{ $cliente->Nombre }} {{ $cliente->Apellido }}</h4>
                <button onclick="window.print()" class="btn btn-outline-secondary btn-sm d-print-none">Imprimir / PDF</button>
            </div>

            @if ($pedidos->isEmpty())
                <div class="alert alert-info mb-0">Este cliente no tiene pedidos registrados.</div>
            @else
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Fecha Pedido</th>
                            <th>Fecha Entrega</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $p)
                            <tr>
                                <td>{{ $p->Id_Pedido }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->FechaPedido)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->FechaEntrega)->format('d/m/Y H:i') }}</td>
                                <td>{{ $p->Observaciones }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="4">Total de pedidos: {{ $pedidos->count() }}</td>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </div>
    @endif
@endsection