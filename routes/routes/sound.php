<?php

use App\Http\Controllers\SoundController;
use Illuminate\Support\Facades\Route;

Route::get('/sound', [SoundController::class, 'showAll']);
Route::post('/sound', [SoundController::class, 'store']);
Route::get('/sound/{id}', [SoundController::class, 'show']);
Route::put('/sound/{id}', [SoundController::class, 'edit']);
Route::delete('/sound/{id}', [SoundController::class, 'destroy']);
