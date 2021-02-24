<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Country\Country;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('country', [CountryController::class, 'country']);
//Route::get('country/{id}', [CountryController::class, 'countryByID']);
//Route::post('country', [CountryController::class, 'countrySave']);        //save
//Route::put('country/{id}', [CountryController::class, 'countryUpdate']);  //update
//Route::delete('country/{id}', [CountryController::class, 'countryDelete']);  //delete

Route::apiResource('country', Country::class);
