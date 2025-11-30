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
        Schema::table('usuario', function (Blueprint $table) {


            $table->string('nombre', 30)->nullable(false)->change();
            $table->string('apellido', 30)->nullable(false)->change();
            $table->string('correo', 30)->nullable(false)->change();
            $table->string('contrasena', 200)->nullable(false)->change();

            $table->renameColumn('correo', 'email');
            $table->renameColumn('contrasena', 'password');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {

            $table->renameColumn('email', 'correo');
            $table->renameColumn('password', 'contrasena');

            $table->string('nombre', 30)->nullable();
            $table->string('apellido', 30)->nullable();
            $table->string('correo', 30)->unique()->nullable();
            $table->string('contrasena', 200)->nullable();
        });
    }
};

