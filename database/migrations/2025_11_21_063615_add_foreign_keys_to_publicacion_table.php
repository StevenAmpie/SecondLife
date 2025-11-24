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
        Schema::table('publicacion', function (Blueprint $table) {
            //
        });

        Schema::table('publicacion', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'fk_publicacion_idUsuario')->references(['id'])->on('usuario')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publicacion', function (Blueprint $table) {
            $table->dropForeign('fk_publicacion_idUsuario');
        });
    }
};
