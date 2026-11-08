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

        $observaciones = [
            'Entregar en horario de oficina', 'Cliente solicita factura',
            'Pago contra entrega', 'Llamar antes de entregar',
            'Empaque para regalo', 'Entrega en recepción',
            'Pedido urgente', 'Dejar con el vigilante',
            'Confirmar dirección', 'Pago con tarjeta',
            'Cliente frecuente', 'Sin observaciones',
        ];

        $pedidos = [];

        for ($i = 0; $i < 12; $i++) {
            $fechaPedido = $faker->dateTimeBetween('-6 months', 'now');

            $fechaEntrega = (clone $fechaPedido)->modify('+' . rand(1, 15) . ' days');

            $pedidos[] = [
                'FechaPedido'   => $fechaPedido->format('Y-m-d H:i:s'),
                'FechaEntrega'  => $fechaEntrega->format('Y-m-d H:i:s'),
                'Observaciones' => $observaciones[$i],

                'Id_Cliente'    => $clientes[$i % count($clientes)],
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        DB::table('pedidos')->insert($pedidos);
    }
}