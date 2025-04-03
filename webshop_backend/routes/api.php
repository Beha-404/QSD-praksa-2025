<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ColorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/colors', ColorsController::class);

Route::apiResource('/brands', BrandsController::class);
