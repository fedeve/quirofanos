<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Especialidad::create([
            'denominacion' => 'Anestesista'
        ] );

        Especialidad::create([
            'denominacion' => 'Cirujano'
        ] );

        Especialidad::create([
            'denominacion' => 'Traumatologo'
        ] );
    }
}
