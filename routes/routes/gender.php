<?php


use App\Http\Controllers\GenderController;
use Illuminate\Support\Facades\Route;


Route::get('/gender', [GenderController::class, 'showAll']);
Route::post('/gender', [GenderController::class, 'store']);
Route::get('/gender/{id}', [GenderController::class, 'show']);
Route::put('/gender/{id}', [GenderController::class, 'edit']);
Route::delete('/gender/{id}', [GenderController::class, 'destroy']);