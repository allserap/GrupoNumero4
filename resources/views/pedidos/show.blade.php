@extends('layouts.app')
@section('title', 'Pedidos')

@section('content')
    <h1>Pedidos</h1>
    <h5>Listado de pedidos</h5>
    <hr>
    <a href="/pedidos/create" class="btn btn-success btn-sm">Agregar nuevo pedido</a>

    <table class="table table-hover table-bordered mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Pedido</th>
                <th>Fecha Entrega</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $item)
                <tr id="row-{{$item->Id_Pedido}}">
                    <td>{{$item->Id_Pedido}}</td>
                    <td>{{$item->cliente->Nombre}} {{$item->cliente->Apellido}}</td>
                    <td>{{\Carbon\Carbon::parse($item->FechaPedido)->format('d/m/Y H:i')}}</td>
                    <td>{{\Carbon\Carbon::parse($item->FechaEntrega)->format('d/m/Y H:i')}}</td>
                    <td>{{$item->Observaciones}}</td>
                    <td>
                        <a href="/pedidos/edit/{{$item->Id_Pedido}}" class="btn btn-warning btn-sm">Modificar</a>

                        <button type="button" class="btn btn-danger btn-sm" url="/pedidos/destroy/{{$item->Id_Pedido}}"
                            token="{{csrf_token()}}" onclick="destroy(this)">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('js/pedido.js')}}"></script>
@endsection