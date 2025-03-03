<?php

use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\CityTemperatureController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Models\CityTemperatureModel;
use App\Models\UserCitiesModel;
use Illuminate\Support\Facades\Route;

//korisnicke rute
// Route::view('/', view: "welcome");
Route::get("/",function(){

    $userFavourites=[];

    $user=Auth::user();
    if($user)
    {
        $userFavourites=UserCitiesModel::where([
            "user_id" => $user->id
        ])->get();
         
    }

    return view("welcome",compact("userFavourites"));

});

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get("/prognoza",[CityTemperatureController::class,"index"]);


// * User cities *
Route::get("/user-cities/favourite/{city}",[UserCitiesController::class,"favourite"])
    ->name("city.favourite");

Route::get("/user-cities/delete/{city}",[UserCitiesController::class,"deleteFavourite"])
    ->name("city.deleteFavourite");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix("/forecast")->group(function(){

    Route::get("/search",[ForecastController::class,"search"])
        ->name("forecast.search");


    Route::get("/{city:name}",[ForecastController::class,"index"])
        ->name("forecast.permalink");
});


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

    Route::post("/addForecast",[AdminForecastController::class,"addForecast"])
        ->name("forecast.addForecast");

    Route::get("/forecast",[AdminForecastController::class,"forecastEntry"]);
});

require __DIR__.'/auth.php';
