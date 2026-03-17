<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use  Illuminate\Auth
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');    
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

    Route::get('/adminProfile', [AdminController::class, 'profile']);
});