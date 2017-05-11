<?php

use Illuminate\Database\Seeder;
use App\Receta;

class RecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receta::create
        ([
        	'sintomas'=>'rep',
        	'diagnosticos'=>'se murio',
        	'tratamientos'=> 'enterrarlo',
        	'observaciones'=>'no se mueve',
           	'paciente_id'=>1,
        ]);
    }
}
