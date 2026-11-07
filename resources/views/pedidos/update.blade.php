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
            <label>Descripción</label>
            <input type="text" name="Descripcion" class="form-control" value="{{ old('Descripcion', $pedido->Descripcion) }}" required maxlength="100">
        </div>
        <div class="mb-3">
            <label>Fecha del pedido</label>
            <input type="date" name="Fecha_Pedido" class="form-control" value="{{ old('Fecha_Pedido', \Carbon\Carbon::parse($pedido->Fecha_Pedido)->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label>Total ($)</label>
            <input type="number" name="Total" class="form-control" value="{{ old('Total', $pedido->Total) }}" step="0.01" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="/pedidos/show" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
