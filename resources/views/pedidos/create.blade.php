@extends('layouts.app')
@section('title', 'Pedidos')

@section('content')
<h1>Pedidos</h1>
<h5>Crear pedido</h5>
<hr>

<div class="container mt-4">
    <h2>Nuevo Pedido</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/pedidos/store" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cliente</label>
            <select name="Id_Cliente" class="form-select" required>
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                <option value="{{ $cliente->Id_Cliente }}" {{ old('Id_Cliente') == $cliente->Id_Cliente ? 'selected' : '' }}>
                    {{ $cliente->Nombre }} {{ $cliente->Apellido }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="Descripcion" class="form-control" value="{{ old('Descripcion') }}" required maxlength="100">
        </div>
        <div class="mb-3">
            <label>Fecha del pedido</label>
            <input type="date" name="Fecha_Pedido" class="form-control" value="{{ old('Fecha_Pedido') }}" required>
        </div>
        <div class="mb-3">
            <label>Total ($)</label>
            <input type="number" name="Total" class="form-control" value="{{ old('Total') }}" step="0.01" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/pedidos/show" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
