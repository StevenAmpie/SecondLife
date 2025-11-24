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
        Schema::create('articulo', function (Blueprint $table) {
            $table->char('id', 36)->default('uuid()')->primary();
            $table->char('id_publicacion', 36)->default('uuid()');
            $table->string('nombre', 30)->nullable();
            $table->string('tipo', 30)->nullable();
            $table->string('talla', 30)->nullable();
            $table->string('marca', 30)->nullable();
            $table->string('color', 30)->nullable();
            $table->string('observacion', 100)->nullable();
            $table->string('img1', 100)->nullable();
            $table->string('img2', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo');
    }
};
