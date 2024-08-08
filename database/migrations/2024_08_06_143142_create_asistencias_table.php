<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('curso_id')->nullable();
            $table->unsignedBigInteger('alumno_id');
            $table->date('date');
            $table->enum('estado', ['presente', 'tarde', 'ausente']);

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('alumno_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
