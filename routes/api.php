<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::post('login', [ApiController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('portofolio', [ApiController::class, 'index']);
    Route::post('portofolio', [ApiController::class, 'store']);
    Route::put('portofolio/{id}', [ApiController::class, 'update']);
    Route::delete('portofolio/{id}', [ApiController::class, 'destroy']);

    Route::post('logout', [ApiController::class, 'logout']);

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});
