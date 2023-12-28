<?php

use App\Http\Controllers\PlayList_SampleController;
use Illuminate\Support\Facades\Route;

Route::post('/playlist_sample', [PlayList_SampleController::class, 'create']);
Route::get('playlist_sample/playlist/{id}', [PlayList_SampleController::class, 'findByPlayList']);
Route::get('playlist_sample/sample/{id}', [PlayList_SampleController::class, 'findBySample']);
