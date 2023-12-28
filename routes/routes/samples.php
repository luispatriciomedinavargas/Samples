<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::post('/sample', [SampleController::class, 'store']);
Route::get('/sample', [SampleController::class, 'show']);
Route::put('/sample/{id}', [SampleController::class, 'edit']);
Route::post('/sample/byfilter', [SampleController::class, 'showByFilter']);
