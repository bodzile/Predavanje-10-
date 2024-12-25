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
        ->name("city.allCities");

    Route::get("/delete-city/{city}",[CityTemperatureController::class,"deleteCity"])
        ->name("city.deleteCity");

    Route::get("/edit/{cityObject}",[CityTemperatureController::class,"editCity"])
        ->name("city.editCity");

    Route::post("/saveEdit",[CityTemperatureController::class,"saveUpdatedCity"])
        ->name("city.saveUpdate");
});

require __DIR__.'/auth.php';
