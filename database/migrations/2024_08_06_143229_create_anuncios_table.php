<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->longText('body')->nullable();
            $table->enum('status', [1,2])->default(1);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('curso_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
