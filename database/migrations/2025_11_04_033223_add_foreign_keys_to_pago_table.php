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
        Schema::table('pago', function (Blueprint $table) {
            $table->foreign(['id_publicacion'], 'fk_pago_idPublicacion')->references(['id'])->on('publicacion')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_usuario'], 'fk_pago_idUsuario')->references(['id'])->on('usuario')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pago', function (Blueprint $table) {
            $table->dropForeign('fk_pago_idPublicacion');
            $table->dropForeign('fk_pago_idUsuario');
        });
    }
};
