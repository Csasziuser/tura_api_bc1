<?php

use App\Models\Jelentkezes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuraController;
use App\Http\Controllers\JelentkezesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/turak',[TuraController::class, 'index']);
Route::post('/turak',[TuraController::class, 'store']);

Route::get('/jelentkezesek', [JelentkezesController::class,'index']);
Route::post('jelentkezesek',[JelentkezesController::class,'store']);
Route::delete('/jelentkezesek/{id}',[JelentkezesController::class, 'destroy']);