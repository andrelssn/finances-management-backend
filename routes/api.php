<?php

use App\Http\Controllers\MonthlyExpensesController;
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

    Route::put('/value/{id}', [UserInfoController::class, 'updateValue']);
    Route::put('/name/{id}', [UserInfoController::class, 'updateName']);
});

Route::prefix('monthly')->middleware('auth:sanctum')->group(function() {
    Route::get('{id}', [MonthlyExpensesController::class, 'index']);
    Route::post('{id}', [MonthlyExpensesController::class, 'store']);
    Route::put('{id}', [MonthlyExpensesController::class, 'update']);
    Route::delete('{id}', [MonthlyExpensesController::class, 'destroy']);
});

Route::get('/web', function () {
    return 'welcome';
});
