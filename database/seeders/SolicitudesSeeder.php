<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = [
            'Rogelio Castro', 'Carlos Pérez', 'Luis Ramírez',
            'Javier Gómez', 'Pedro Sánchez', 'Alejandro Jiménez', 
            'Santiago Vargas', 'Andrés Ortega', 'Fernando Morales', 
            'Roberto Paredes', 'Jorge Álvarez', 'José Ramírez', 'David Torres',
            'Raúl Ríos', 'Miguel López',
            'Juan Martínez', 'Daniel Fernández', 'Alberto Mendoza',
            'Sergio Herrera', 'Mario González', 'Eduardo Ponce',
            'Gabriel Díaz', 'Héctor López', 'Ricardo Ríos', 'Hugo Medina',
            'Adrián Cordero', 'Ernesto Torres', 'Fabián Ponce'
        ];
        
        $descripciones = [
            'Al llegar al Centro de Ventas me percaté de la falla',
            'El vehículo presenta problemas al arrancar en frío',
            'Las luces del tablero están parpadeando intermitentemente',
            'Se escucha un ruido extraño proveniente del motor',
            'La transmisión no cambia de marcha correctamente',
            'El aire acondicionado no enfría correctamente',
            'El volante vibra a altas velocidades',
            'La dirección asistida hace ruidos al girar',
            'Los frenos hacen ruido al frenar bruscamente',
            'El sistema de audio no funciona adecuadamente'
        ];
        
        for ($i = 0; $i < 50; $i++) {
            $eco = rand(1, 59999);
            $km = rand(1000, 100000);
            $persona = $nombres[array_rand($nombres)];
            $fallas_id = rand(2, 12);
            $descripcion = $descripciones[array_rand($descripciones)];
        
            DB::table('solicitudes')->insert([
                'eco' => $eco,
                'km' => $km,
                'persona' => $persona,
                'fallas_id' => $fallas_id,
                'descripcion' => $descripcion,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
