<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
        	'name'=>'Administrador',
        	'email'=>'admin@hotmail.com',
        	'password'=> bcrypt('asdqwe123'),
        	'role'=>0,
        ]);

        User::create
        ([
            'name'=>'Doctor',
            'email'=>'doc@hotmail.com',
            'password'=> bcrypt('asdqwe123'),
            'role'=>1,
        ]);
    }
}
