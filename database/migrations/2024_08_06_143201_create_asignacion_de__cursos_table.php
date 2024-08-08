<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignacion_de__cursos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('rol', ['alumno', 'otro']);
            
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignacion_de__cursos');
    }
};
