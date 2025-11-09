<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;


//Put your route view here

Route::get('/catalog', [CatalogoController::class, 'index']);

