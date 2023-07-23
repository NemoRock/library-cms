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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/categories',[\App\Http\Controllers\Api\CategoryController::class, 'store']);
Route::get('categories/{category}',[\App\Http\Controllers\Api\CategoryController::class, 'show']);
Route::patch('/categories/{category}',[\App\Http\Controllers\Api\CategoryController::class, 'update']);
Route::get('/categories',[\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::delete('/categories/{category}',[\App\Http\Controllers\Api\CategoryController::class, 'destroy']);
