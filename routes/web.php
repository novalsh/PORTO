<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\WebController::class, 'index']);

Auth::routes(['confirm' => true]);

Route::get('/daftar', [RegisterController::class, 'index'])->name('daftar');


Route::resource('/portfolios', App\Http\Controllers\portofolioController::class);

// Route::get('/dashboard', function (){
//     return view('dashboard.dashboard');
// });

Route::get('/dashboard', [App\Http\Controllers\dashboard::class, 'index'])->name('dashboard.index');

Route::resource('/portfolios', App\Http\Controllers\portofolioController::class);

Route::get('/portofolios', [App\Http\Controllers\portofolioController::class, 'index'])->name('portofolios.index');

Route::get('/portofolios/create', [App\Http\Controllers\portofolioController::class, 'create'])->name('portofolios.create');

Route::post('/portofolios', [App\Http\Controllers\portofolioController::class, 'store'])->name('portofolios.store');

Route::get('/portofolios/{portofolio}', [App\Http\Controllers\portofolioController::class, 'show'])->name('portofolios.show');

Route::get('/portofolios/{portofolio}/edit', [App\Http\Controllers\portofolioController::class, 'edit'])->name('portofolios.edit');

Route::put('/portofolios/{portofolio}', [App\Http\Controllers\portofolioController::class, 'update'])->name('portofolios.update');

Route::delete('/portofolios/{portofolio}', [App\Http\Controllers\portofolioController::class, 'destroy'])->name('portofolios.destroy');


Route::resource('/categories', App\Http\Controllers\CategoryController::class);

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');


