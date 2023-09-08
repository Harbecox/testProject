<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("affiliate")->group(function (){
    Route::get("/",[\App\Http\Controllers\Api\AffiliateController::class,"index"]);
    Route::post("/",[\App\Http\Controllers\Api\AffiliateController::class,"store"]);
    Route::get("{id}",[\App\Http\Controllers\Api\AffiliateController::class,"show"]);
    Route::post("{id}/employee",[\App\Http\Controllers\Api\AffiliateController::class,"add_employee"]);
});
