<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayListController;

Route::post('/playList', [PlayListController::class, 'store']);
Route::get('/playList/{id}', [PlayListController::class, 'show']);
Route::put('/playList/{id}', [PlayListController::class, 'edit']);
Route::delete('/playList/{id}', [PlayListController::class, 'destroy']);