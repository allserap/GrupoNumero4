<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Faker en español
        $faker = Faker::create('es_ES'); 
        
        $clientes = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $clientes[] = [
                // Genera información aleatoria incluidas edades entre 18 y 50 
                'Nombre' => $faker->firstName,
                'Apellido' => $faker->lastName,
                'Fecha_Nac' => $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Insertamos los 12 registros de una vez
        DB::table('clientes')->insert($clientes);
    }
}
