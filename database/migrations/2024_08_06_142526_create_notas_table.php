<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('boletin_id')->constrained('boletins')->onDelete('cascade');
            $table->string('materia');
            $table->integer('bimestre')->check('bimestre BETWEEN 1 AND 4');
            $table->decimal('nota', 5, 2);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
