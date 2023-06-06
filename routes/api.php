<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('portofolios', [App\Http\Controllers\PortofolioController::class, 'index']);

Route::resource('/register', App\Http\Controllers\Auth\RegisterController::class, ['only' => ['index', 'store']]);


