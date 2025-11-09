<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->char('id', 36)->default('uuid()')->primary();
            $table->string('titulo', 30)->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->float('precio')->nullable();
            $table->string('portada', 30)->nullable();
            $table->date('fecha')->nullable();
            $table->string('estado', 10)->nullable();
            $table->string('visibilidad', 10)->nullable();
            $table->integer('vistas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
