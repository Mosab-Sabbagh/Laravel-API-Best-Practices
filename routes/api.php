<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\TaskController;

Route::prefix('v1')->group(function () {

    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [AuthController::class, 'profile']);
    });
});


Route::prefix('v1')->middleware('auth:sanctum')->group(function(){
    Route::apiResource('tasks',TaskController::class);
    Route::patch('tasks/{task}/status', [TaskController::class, 'updateStatus']);

});

