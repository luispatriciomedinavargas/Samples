<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

Route::get('/group', [GroupController::class, 'showAll']);
Route::post('/group', [GroupController::class, 'store']);
Route::get('/group/{id}', [GroupController::class, 'show']);
Route::put('/group/{id}', [GroupController::class, 'edit']);
Route::delete('/group/{id}', [GroupController::class, 'destroy']);
