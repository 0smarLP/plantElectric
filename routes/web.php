<?php

use App\Http\Controllers\ChargeSubDerivateController;
use App\Http\Controllers\ChargeDerivateController;
use App\Http\Controllers\ElectricChargeController;
use App\Http\Controllers\RoomController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/dashboard');
    }

    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    /*-------------------------------- FORMULARIOS ------------------------------*/
    Route::resource('cuartos-electricos', RoomController::class);
    Route::resource('transformadores', ElectricChargeController::class);
    Route::resource('tableros-de-distribucion', ChargeDerivateController::class);
    Route::resource('cargas-electricas', ChargeSubDerivateController::class);
    /*------------------------------------------------------------------------*/
});
