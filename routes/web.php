<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupContrller;
use App\Http\Controllers\PlayList_SampleController;
use App\Http\Controllers\PlayListController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SoundContrller;
use App\Http\Controllers\TypeContrller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
