
<?php


use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;


Route::get('/address', [AddressController::class, 'showAll']);
Route::post('/address', [AddressController::class, 'store']);
Route::get('/address/{id}', [AddressController::class, 'show']);
Route::put('/address/{id}', [AddressController::class, 'edit']);
Route::delete('/address/{id}', [AddressController::class, 'destroy']);