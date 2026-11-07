<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::select(
            "Id_Cliente",
            "Nombre",
            "Apellido",
            "Fecha_Nac"
        )->get();

        return view('/clientes/show')->with(['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellido' => 'required|string|max:50',
            'Fecha_Nac' => 'required|date',
        ]);

        Cliente::create($request->all());
       return redirect('/clientes/show')->with('success', 'Cliente guardado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('/clientes/update')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
       $data = request()->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Fecha_Nac' => 'required',
        ]);

        $cliente->Nombre = $data['Nombre'];
        $cliente->Apellido = $data['Apellido'];
        $cliente->Fecha_Nac = $data['Fecha_Nac'];
        $cliente->updated_at = now();

        $cliente->save();

        return redirect('/clientes/show')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Cliente::destroy($id);

        return response()->json(array('res'=>true));
    }
}
