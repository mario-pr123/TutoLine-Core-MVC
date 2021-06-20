<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_tutor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id_tutor');
            $table->unsignedBigInteger('alumno_id_alumno');
            $table->foreign('tutor_id_tutor')->references('id_tutor')->on('tutors')->onDelete('cascade');
            $table->foreign('alumno_id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade');
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
        Schema::dropIfExists('tutor_alumnos');
    }
}
