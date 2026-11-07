<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    // Menú de reportes
    public function index()
    {
        return view('reportes.index');
    }
// 
    //pedidos de un cliente seleccionado
    public function pedidosPorCliente(Request $request)
    {
        $clientes = Cliente::orderBy('Nombre')->get();
        $cliente = null;
        $pedidos = collect();

        if ($request->filled('Id_Cliente')) {
            $request->validate(['Id_Cliente' => 'exists:clientes,Id_Cliente']);

            $cliente = Cliente::find($request->Id_Cliente);
            $pedidos = Pedido::where('Id_Cliente', $cliente->Id_Cliente)
                ->orderBy('Fecha_Pedido')
                ->get();
        }

        return view('reportes.pedidos_cliente', compact('clientes', 'cliente', 'pedidos'));
    }

    // todos los pedidos
    public function pedidos()
    {
        $pedidos = Pedido::with('cliente')->orderBy('Id_Pedido')->get();
        return view('reportes.pedidos', compact('pedidos'));
    }

    // todos los clientes
    public function clientes()
    {
        $clientes = Cliente::orderBy('Id_Cliente')->get();
        return view('reportes.clientes', compact('clientes'));
    }
}