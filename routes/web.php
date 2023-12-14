<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupContrller;
use App\Http\Controllers\PlayList_SampleController;
use App\Http\Controllers\PlayListController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SoundContrller;
use App\Http\Controllers\TypeContrller;
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



Route::get('/type', [TypeContrller::class, 'showAll']);
Route::post('/type', [TypeContrller::class, 'store']);
Route::get('/type/{id}', [TypeContrller::class, 'show']);
Route::put('/type/{id}', [TypeContrller::class, 'edit']);
Route::delete('/type/{id}', [TypeContrller::class, 'destroy']);



Route::get('/sound', [SoundContrller::class, 'showAll']);
Route::post('/sound', [SoundContrller::class, 'store']);
Route::get('/sound/{id}', [SoundContrller::class, 'show']);
Route::put('/sound/{id}', [SoundContrller::class, 'edit']);
Route::delete('/sound/{id}', [SoundContrller::class, 'destroy']);



Route::get('/group', [GroupContrller::class, 'showAll']);
Route::post('/group', [GroupContrller::class, 'store']);
Route::get('/group/{id}', [GroupContrller::class, 'show']);
Route::put('/group/{id}', [GroupContrller::class, 'edit']);
Route::delete('/group/{id}', [GroupContrller::class, 'destroy']);



Route::post('/playList', [PlayListController::class, 'store']);
Route::get('/playList/{id}', [PlayListController::class, 'show']);
Route::put('/playList/{id}', [PlayListController::class, 'edit']);
Route::delete('/playList/{id}', [PlayListController::class, 'destroy']);



Route::post('/sample', [SampleController::class, 'store']);
Route::get('/sample', [SampleController::class, 'show']);
Route::put('/sample/{id}', [SampleController::class, 'edit']);
Route::get('/sample/byfilter', [SampleController::class, 'showByFilter']);


Route::post('/playlist_sample', [PlayList_SampleController::class, 'create']);
Route::get('playlist_sample/playlist/{id}', [PlayList_SampleController::class, 'findByPlayList']);
Route::get('playlist_sample/sample/{id}', [PlayList_SampleController::class, 'findBySample']);
