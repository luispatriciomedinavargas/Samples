<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/gender', [GenderController::class, 'showAll']);
Route::post('/gender', [GenderController::class, 'store']);
Route::get('/gender/{id}', [GenderController::class, 'show']);
Route::put('/gender/{id}', [GenderController::class, 'edit']);
Route::delete('/gender/{id}', [GenderController::class, 'destroy']);

// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/gender',GenderController::class);
// Route::resource('/group', GroupController::class);
// Route::resource('/sound',SoundController::class);
// Route::resource('/type',TypeController::class);