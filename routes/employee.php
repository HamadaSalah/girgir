<?php

use App\Http\Controllers\Employee\HomeController;
use App\Http\Controllers\Employee\LogoutController;
use App\Http\Controllers\Employee\OrdersController;
use Illuminate\Support\Facades\Route;

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

Route::get('',HomeController::class)->name('home');

Route::get('logout' , LogoutController::class)->name('logout');

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('', [OrdersController::class, 'index'])->name('index');
    Route::get('{order}/show', [OrdersController::class, 'show'])->name('show');
});
