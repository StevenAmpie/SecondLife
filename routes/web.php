<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::redirect('/', '/catalog');

Route::controller(CatalogoController::class)->group(function () {
    Route::get('/catalog', 'index')->name('catalogo.index');
    Route::get('/catalog/publication/{id}', 'show')->name('catalogo.show');
    Route::get('/catalog/search',  'search')->name('catalogo.search');
    Route::get('/catalog/filters', 'filters')->name('catalogo.filters');
});

Route::controller(ArticuloController::class)->group(function () {
    Route::get('articles/{article}/edit', 'edit')->name('articulo.edit');
    Route::put('articles/{article}', 'update')->name('articulo.update');
});

Route::middleware('guest')->group(function () {


    Route::controller(UsuarioController::class)->group(function () {

        Route::get('register', 'create')
            ->name('register');

        Route::post('register', 'store')
            ->name('register.store');

    });

    Route::controller(AuthenticatedSessionController::class)->group(function () {

        Route::get('login', 'create')
            ->name('login');
        Route::post('login', 'store')
            ->name('login.store');

    });

});


