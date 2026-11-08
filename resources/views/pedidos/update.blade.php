@extends('layouts.app')
@section('title', 'Pedidos')

@section('content')
<h1>Pedidos</h1>
<h5>Actualizar pedido</h5>
<hr>
<div class="container mt-4">
    <h2>Editar Pedido</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/pedidos/update/{{ $pedido->Id_Pedido }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Cliente</label>
            <select name="Id_Cliente" class="form-select" required>
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->Id_Cliente }}" {{ old('Id_Cliente', $pedido->Id_Cliente) == $cliente->Id_Cliente ? 'selected' : '' }}>
                    {{ $cliente->Nombre }} {{ $cliente->Apellido }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Fecha del pedido</label>
            <input type="datetime-local" name="FechaPedido" class="form-control"
                value="{{ old('FechaPedido', \Carbon\Carbon::parse($pedido->FechaPedido)->format('Y-m-d\TH:i')) }}" required>
        </div>
        <div class="mb-3">
            <label>Fecha de entrega</label>
            <input type="datetime-local" name="FechaEntrega" class="form-control"
                value="{{ old('FechaEntrega', \Carbon\Carbon::parse($pedido->FechaEntrega)->format('Y-m-d\TH:i')) }}" required>
        </div>
        <div class="mb-3">
            <label>Observaciones</label>
            <textarea name="Observaciones" class="form-control" maxlength="150" rows="3">{{ old('Observaciones', $pedido->Observaciones) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="/pedidos/show" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection