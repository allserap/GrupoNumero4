<?php

use Illuminate\Support\Facades\Route;

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
