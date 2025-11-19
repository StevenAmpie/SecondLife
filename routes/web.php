<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;

//Put your routes view here

// You can code a route group like this
/*Route::controller(EntityNameController::class)->group(function () {
    Route::get('/name', [Entity::class, 'method_1']);
    Route::post('/name/{parameter}', [EntityController::class, 'method_2']);
});*/

#catalog
Route::controller(CatalogoController::class)->group(function () {
    Route::get('/catalog', [CatalogoController::class, 'index'])->name('catalogo.index');
    Route::get('/catalog/{id}', [CatalogoController::class, 'show'])->name('catalogo.show');
});
Route::get('/edit_article', [ArticuloController::class, 'edit']);
Route::get('/publish', [PublicacionController::class, 'create']);
