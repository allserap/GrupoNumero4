@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
<h1>Clientes</h1>
<h5>Listado de clientes</h5>
<hr>
<a href="/clientes/create" class="btn btn-success btn-sm">Agregar nuevo cliente</a>

<table class="table table-hover table-bordered mt-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $item)
        <tr id="row-{{$item->Id_Cliente}}">
            <td>{{$item->Id_Cliente}}</td>
            <td>{{$item->Nombre}}</td>
            <td>{{$item->Apellido}}</td>
            <td>{{\Carbon\Carbon::parse($item->Fecha_Nac)->format('d/m/Y')}}</td>
            <td>
                <a href="/clientes/edit/{{$item->Id_Cliente}}" class="btn btn-warning btn-sm">Modificar</a>

                <button type="button" 
                class="btn btn-danger btn-sm" 
                url="/clientes/destroy/{{$item->Id_Cliente}}" 
                token="{{csrf_token()}}" 
                onclick="destroy(this)">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('js/cliente.js')}}"></script> 
@endsection