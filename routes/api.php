<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);
Route::middleware('auth:api')->group(function () {
    Route::apiResource('categories', CategoryController::class);
});
