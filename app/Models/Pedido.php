<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //Llave primaria
    protected $primaryKey = 'Id_Pedido';

    protected $fillable = ['Id_Cliente', 'Descripcion', 'Fecha_Pedido', 'Total'];

    // Un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_Cliente', 'Id_Cliente');
    }
}
