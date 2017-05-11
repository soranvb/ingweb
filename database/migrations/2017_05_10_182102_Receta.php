<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Receta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('sintomas')->nullable(); 
            $table->string('diagnosticos')->nullable();
            $table->string('tratamientos')->nullable();
            $table->string('observaciones')->nullable();
            $table->softDeletes();  








           $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');


          
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
