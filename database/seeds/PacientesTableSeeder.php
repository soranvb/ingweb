<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Paciente::create
        ([
        	'name'=>'juan',
            'edad'=>10,
        	'sexo'=>1,
        	'user_id'=>1,
            'paciente_id'=>1,            
            'email'=>'pepino@hotmail.com',
        	]);
    }
}
