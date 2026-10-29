<?php

namespace Database\Seeders;

use App\Models\Obra_social;
use App\Models\Profesional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
           
        Profesional::create([
            'nombre' => 'Casella Federico Rafael' ,
            'id_especialidad' => '1' ,
            'cuit' => '20306887247' ,
            'mail'  => 'fedecasella@me.com' ,
            'telefono' => '3364204800' ,
            'matricula' => '94937' ,
            'hora_inicio'  => '08:00' ,
            'hora_fin'  => '21:00' ,
            'minutos_hab'  => '00' 
        ] );

         
  

    }
}
