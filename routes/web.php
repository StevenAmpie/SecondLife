<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

//Put your routes view here

// You can code a route group like this
/*Route::controller(EntityNameController::class)->group(function () {
    Route::get('/name', [Entity::class, 'method_1']);
    Route::post('/name/{parameter}', [EntityController::class, 'method_2']);
});*/

Route::redirect('/', '/catalog');
#catalog
Route::controller(CatalogoController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalogo.index');
    Route::get('/catalog/publication/{id}', 'show')->name('catalogo.show');
    Route::get('/catalog/search',  'search')->name('catalogo.search');
    Route::get('/catalog/filters', 'filters')->name('catalogo.filters');
});

Route::get('/payment', [PagoController::class, 'create'])->middleware('auth');
Route::get('/edit/{id_post}/{id_article}', [ArticuloController::class, 'edit']);
Route::get('/publish', [PublicacionController::class, 'create'])->name('publish.create');

#my_publications

// Ruta principal del módulo "Mis publicaciones"
Route::get('/publicaciones', [PublicacionController::class, 'index'])
    ->name('publicaciones.index');

Route::get('/my-publications', function () {
    return redirect()->route('publicaciones.index');
})->name('publicaciones.mias');

// Vista estática de "Edit publication".
// Más adelante esta ruta se cambiara
Route::get('/edit-publication', [PublicacionController::class, 'show']);
