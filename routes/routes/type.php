<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/type', [TypeController::class, 'showAll']);
Route::post('/type', [TypeController::class, 'store']);
Route::get('/type/{id}', [TypeController::class, 'show']);
Route::put('/type/{id}', [TypeController::class, 'edit']);
Route::delete('/type/{id}', [TypeController::class, 'destroy']);
