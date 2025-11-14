<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;

//Put your routes view here



// You can code a route group like this

/*Route::controller(EntityNameController::class)->group(function () {
    Route::get('/name', [Entity::class, 'method_1']);
    Route::post('/name/{parameter}', [EntityController::class, 'method_2']);
});*/


Route::get('/catalog', [CatalogoController::class, 'index']);
Route::get('/publicar', [PublicacionController::class, 'create']);
#catalog
Route::controller(CatalogoController::class)->group(function () {
    Route::get('/catalog', [CatalogoController::class, 'index'])->name('catalogo.index');
    Route::get('/catalog/{id}', [CatalogoController::class, 'show'])->name('catalogo.show');

});


