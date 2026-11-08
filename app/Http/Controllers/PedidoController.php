<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with('cliente')->get();

        return view('/pedidos/show')->with(['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::select('Id_Cliente', 'Nombre', 'Apellido')->get();

        return view('/pedidos/create')->with(['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'FechaPedido'   => 'required|date',
            'FechaEntrega'  => 'required|date|after_or_equal:FechaPedido',
            'Observaciones' => 'nullable|string|max:150',
            'Id_Cliente'    => 'required|exists:clientes,Id_Cliente',
        ]);

        Pedido::create($data);

        return redirect('/pedidos/show')->with('success', 'Pedido guardado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::select('Id_Cliente', 'Nombre', 'Apellido')->get();

        return view('/pedidos/update')->with(['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $data = $request->validate([
            'FechaPedido'   => 'required|date',
            'FechaEntrega'  => 'required|date|after_or_equal:FechaPedido',
            'Observaciones' => 'nullable|string|max:150',
            'Id_Cliente'    => 'required|exists:clientes,Id_Cliente',
        ]);

        $pedido->update($data);

        return redirect('/pedidos/show')->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pedido::destroy($id);

        return response()->json(array('res' => true));
    }
}