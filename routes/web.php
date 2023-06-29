<?php

use App\Http\Controllers\{
    VehicleController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [VehicleController::class, 'index'])->name('vehicle.index');
Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

Route::put('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'delete'])->name('vehicle.delete');
