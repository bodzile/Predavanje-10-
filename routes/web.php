<?php

use App\Http\Controllers\CityTemperatureController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth",CheckAdminMiddleware::class])->prefix("admin")->group(function(){
    Route::view("/add-city","add-city");

    Route::post("/add-city-action",[CityTemperatureController::class,"addCity"])
        ->name("city.add");

    Route::get("/all-cities",[CityTemperatureController::class,"allCities"])
        ->name("citi.allCities");
});

require __DIR__.'/auth.php';
