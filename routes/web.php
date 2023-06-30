<?php

use App\Http\Controllers\{
    VehicleController,
    LoginController
};
use Illuminate\Support\Facades\Route;


Route::controller(VehicleController::class)->group(function(){
    Route::get('/', 'index')->name('vehicle.index');
    Route::get('/vehicle/{id}', 'show')->name('vehicle.show');
    Route::put('/vehicle/update/{id}', 'update')->name('vehicle.update');
    Route::post('/vehicle', 'store')->name('vehicle.store');
    Route::delete('/vehicle/delete/{id}', 'delete')->name('vehicle.delete');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::get('/logout', 'destroy')->name('login.destroy');
    Route::post('/login', 'store')->name('login.store');
});
