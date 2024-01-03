<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyBillController;

Route::post('/buy', [BuyBillController::class, 'store']);
Route::get('/buy', [BuyBillController::class, 'showAll']);
Route::get('/buy/{id}', [BuyBillController::class, 'show']);