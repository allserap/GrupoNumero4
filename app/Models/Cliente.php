<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Llave primaria
    protected $primaryKey = 'Id_Cliente';

    protected $fillable = ['Nombre', 'Apellido', 'Fecha_Nac'];
}
