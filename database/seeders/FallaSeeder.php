<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fallas')->insert([
            'categoria' => 1,
            'nombre' => 'Cristales',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 1,
            'nombre' => 'Elevadores',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 1,
            'nombre' => 'Botón intermitentes',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 1,
            'nombre' => 'Asientos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 1,
            'nombre' => 'Cable de impresora',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 2,
            'nombre' => 'Cámara de reversa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 2,
            'nombre' => 'Alarma de reversa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 2,
            'nombre' => 'Frenos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 2,
            'nombre' => 'Limpiadores',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 2,
            'nombre' => 'Luces (stop, frenos, cuartos, intermitentes, direccionales)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 3,
            'nombre' => 'Puerta lateral',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 3,
            'nombre' => 'Puerta trasera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fallas')->insert([
            'categoria' => 3,
            'nombre' => 'Estantería',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
