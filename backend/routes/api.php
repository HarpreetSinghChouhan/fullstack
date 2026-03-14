<?php

use App\Http\Controllers\TestContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login',[UserController::class,'login']);
// Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');    
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/profile',[UserController::class,'profile']);
    Route::post('/logout',[UserController::class.'logout']); 
    });

    Route::get('/status',[TestContoller::class,'status']);
    Route::get('/user',[TestContoller::class,'user']);