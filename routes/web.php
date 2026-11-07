<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    $integrantes = [
        ['nombre' => 'Diego', 'apellido' => 'Carias', 'carnet' => '022123'],
        ['nombre' => 'Ulises', 'apellido' => 'Rivera', 'carnet' => '022723'],
        ['nombre' => 'Allison', 'apellido' => 'Servano', 'carnet' => '046923'],
        ['nombre' => 'Liliana', 'apellido' => 'Villalta', 'carnet' => '023723'],
    ];
    $grupo = "Grupo Número 4";

    return view('welcome', compact('integrantes', 'grupo'));
});

// :::::::::: RUTAS PARA CLIENTES :::::::::
Route::get('/clientes/show', [ClienteController::class, 'index'])->name('clientes.show');
Route::get('/clientes/create', [ClienteController::class, 'create']);
Route::post('/clientes/store', [ClienteController::class, 'store']);
Route::get('/clientes/edit/{cliente}', [ClienteController::class, 'edit']);
Route::put('/clientes/update/{cliente}', [ClienteController::class, 'update']);
Route::delete('/clientes/destroy/{cliente}', [ClienteController::class, 'destroy']);

// :::::::::: RUTAS PARA PEDIDOS :::::::::
Route::get('/pedidos/show', [PedidoController::class, 'index'])->name('pedidos.show');
Route::get('/pedidos/create', [PedidoController::class, 'create']);
Route::post('/pedidos/store', [PedidoController::class, 'store']);
Route::get('/pedidos/edit/{pedido}', [PedidoController::class, 'edit']);
Route::put('/pedidos/update/{pedido}', [PedidoController::class, 'update']);
Route::delete('/pedidos/destroy/{pedido}', [PedidoController::class, 'destroy']);
