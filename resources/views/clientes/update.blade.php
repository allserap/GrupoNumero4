@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
<h1>Clientes</h1>
<h5>Actualizar cliente</h5>
<hr>
<div class="container mt-4">
    <h2>Editar Cliente</h2>
    <form action="/clientes/update/{{ $cliente->Id_Cliente }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ $cliente->Nombre }}" required maxlength="50">
        </div>
        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="Apellido" class="form-control" value="{{ $cliente->Apellido }}" required maxlength="50">
        </div>
        <div class="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="Fecha_Nac" class="form-control" value="{{ \Carbon\Carbon::parse($cliente->Fecha_Nac)->format('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="/clientes/show" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection