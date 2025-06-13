<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json("Hai! Ini berbentuk api yang dapat diakses melalui 'api/v1'");
});

Route::prefix('api/v1')->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'showAll']);
        Route::get('/{id}', [EmployeeController::class, 'showOne']);
        Route::post('/', [EmployeeController::class, 'store']);
        Route::put('{id}', [EmployeeController::class, 'update']);
        Route::delete('{id}', [EmployeeController::class, 'delete']);
    });
});

Route::get('/init', function () {
    return response()->json(['token' => csrf_token()]);
});
