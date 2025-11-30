<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
