<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('objetivos');
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id('id_objetivo');
            $table->string('nombre_objetivo');
            $table->string('descripcion_objetivo');
            $table->unsignedBigInteger('alumno_id_alumno');
            $table->foreign('alumno_id_alumno')->references('alumno_id_alumno')->on('alumno_tutors')->onDelete('CASCADE');
            $table->unsignedBigInteger('tutor_id_tutor');
            $table->foreign('tutor_id_tutor')->references('tutor_id_tutor')->on('alumno_tutors')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
}
