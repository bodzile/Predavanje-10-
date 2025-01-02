<?php

use App\Http\Controllers\CityTemperatureController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminMiddleware;
use Illuminate\Support\Facades\Route;






//admin rute
Route::middleware(["auth",CheckAdminMiddleware::class])->prefix("admin")->group(function(){
    Route::get("/add-city",[CityTemperatureController::class,"addCityEntry"]);

    Route::post("/add-city-action",[CityTemperatureController::class,"addCity"])
        ->name("city.add");

    Route::get("/all-cities",[CityTemperatureController::class,"allCities"])
        ->name("city.allCities");

    Route::get("/delete-city/{city}",[CityTemperatureController::class,"deleteCity"])
        ->name("city.deleteCity");

    Route::get("/edit/{cityObject}",[CityTemperatureController::class,"editCity"])
        ->name("city.editCity");

    Route::post("/saveEdit/{cityObject}",[CityTemperatureController::class,"saveUpdatedCity"])
        ->name("city.saveUpdate");

    Route::post("/addForecast",[ForecastController::class,"addForecast"])
        ->name("forecast.addForecast");

    Route::get("/forecast",[ForecastController::class,"forecastEntry"]);
});

//korisnicke rute
Route::view('/', "welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/prognoza",[CityTemperatureController::class,"index"]);

Route::get("/forecast/{city:name}",[ForecastController::class,"index"]);

require __DIR__.'/auth.php';
