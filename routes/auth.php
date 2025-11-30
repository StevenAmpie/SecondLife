<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::controller(PublicacionController::class)->group(function () {

        Route::get('/my-publications', 'index')
            ->name('publicaciones.index');

        Route::get('/publish', 'create')
            ->name('publish.create');

        Route::put('/update-state/{id}', 'updateState')
            ->name('update-state');

        Route::get('/edit-publication', 'show')
            ->name('publicaciones.show');

        Route::delete('delete/{id_post}', 'destroy')
            ->name('publicaciones.destroy');

    });

    Route::controller(ArticuloController::class)->group(function () {

        Route::get('/edit/{id_post}/{id_article}', 'edit');

    });

    Route::controller(PagoController::class)->group(function () {

        Route::get('/payment', 'create');

    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
