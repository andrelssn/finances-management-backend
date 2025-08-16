<?php

use App\Http\Controllers\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('user')->middleware('auth:sanctum')->group(function() {
    Route::get('/', function (Request $request) {
        return $request->user();
    });

    Route::put('/value/{id}', [UserInfoController::class, 'update']);
});

Route::get('/web', function () {
    return 'welcome';
});
