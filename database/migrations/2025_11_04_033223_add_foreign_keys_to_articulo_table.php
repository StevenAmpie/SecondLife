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
        Schema::table('articulo', function (Blueprint $table) {
            $table->foreign(['id'], 'fk_articulo_idPublicacion')->references(['id'])->on('publicacion')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articulo', function (Blueprint $table) {
            $table->dropForeign('fk_articulo_idPublicacion');
        });
    }
};
