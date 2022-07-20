<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::name('register.')->prefix('register')->group(function () {
    Route::post('/store', [RegisterController::class, 'store'])->name('store');
});
Route::name('admin.')->prefix('administracja')->group(function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/home', [AdminController::class, 'home'])->name('home');
    });
});
