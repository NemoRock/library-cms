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
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh']);
    Route::post('/me', [\App\Http\Controllers\Api\AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::get('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'show']);
    Route::patch('/categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::delete('/categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'destroy']);
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/books', [\App\Http\Controllers\Api\BookController::class, 'store']);
    Route::get('books/{book}', [\App\Http\Controllers\Api\BookController::class, 'show']);
    Route::patch('/books/{book}', [\App\Http\Controllers\Api\BookController::class, 'update']);
    Route::get('/books', [\App\Http\Controllers\Api\BookController::class, 'index']);
    Route::delete('/books/{book}', [\App\Http\Controllers\Api\BookController::class, 'destroy']);
});
