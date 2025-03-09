<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::apiResource('games', GameController::class)
    ->middleware(['auth:sanctum', 'throttle:api']);

Route::post('/players/addToCollection', [PlayerController::class, 'addToCollection'])
    ->middleware(['auth:sanctum', 'throttle:api']);
