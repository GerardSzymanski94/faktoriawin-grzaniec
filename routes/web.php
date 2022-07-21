<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\SendMailController;

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
Route::name('mail.')->prefix('mail')->group(function () {
    Route::post('/contact', [SendMailController::class, 'contact'])->name('contact');
});
Route::name('admin.')->prefix('administracja')->group(function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\RegisterController::class, 'index']);
        Route::get('/show/{register}', [\App\Http\Controllers\Admin\RegisterController::class, 'show'])->name('show');
        Route::get('/winner/{register}/{prize}', [\App\Http\Controllers\Admin\RegisterController::class, 'winner'])->name('winner');
        Route::get('/winners', [\App\Http\Controllers\Admin\RegisterController::class, 'winners'])->name('winners');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::name('mail.')->prefix('mail')->group(function () {
            Route::get('/show/{mail}', [\App\Http\Controllers\Admin\SendMailController::class, 'show'])->name('show');
        });

    });
});
