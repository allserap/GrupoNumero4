<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Debe ejecutarse después de ClienteSeeder (necesita clientes existentes).
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        $clientes = Cliente::pluck('Id_Cliente')->all();

        if (empty($clientes)) {
            $this->command?->warn('No hay clientes; ejecute primero ClienteSeeder.');
            return;
        }

        $productos = [
            'Laptop', 'Mouse inalámbrico', 'Teclado mecánico', 'Monitor 24"',
            'Impresora', 'Disco duro externo', 'Memoria USB', 'Audífonos',
            'Cámara web', 'Router WiFi', 'Tablet', 'Cargador portátil',
        ];

        $pedidos = [];

        for ($i = 0; $i < 12; $i++) {
            $pedidos[] = [
                // Cada pedido queda asociado a un cliente existente
                'Id_Cliente'   => $clientes[$i % count($clientes)],
                'Descripcion'  => $productos[$i],
                'Fecha_Pedido' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'Total'        => $faker->randomFloat(2, 5, 1500),
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        DB::table('pedidos')->insert($pedidos);
    }
}
