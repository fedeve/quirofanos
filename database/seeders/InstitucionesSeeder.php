<?php

namespace Database\Seeders;

use App\Models\Institucion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitucionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        
        Institucion::create([
            'nombre' => 'Instituto Médico Los Arroyos'
        ]);
        Institucion::create([
            'nombre' => 'Hospital Provincial de Agudos San Felipe'
        ]);
        Institucion::create([
            'nombre' => 'Hospital Jose Maria Gomendio'
        ]);

        Institucion::create([
            'nombre' => 'Fundación Nuestra Señora Del Rosario'
        ]);

        Institucion::create([
            'nombre' => 'Clínica Diagnóstico'
        ]);

        Institucion::create([
            'nombre' => 'Clínica San Nicolás'
        ]);
    }
}
