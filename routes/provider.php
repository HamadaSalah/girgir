<?php

use App\Http\Controllers\Provider\{HomeController, OrdersController, PackagesController , SignOutController};
use App\Models\Package;
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

Route::group(['prefix' => 'packages', 'as' => 'packages.', 'controller' => PackagesController::class],function(){
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('package/{package}', 'show')->name('show');
    Route::get('edit/{package}', 'edit')->name('edit');
    Route::put('update/{package}', 'update')->name('update');
    Route::delete('package/{package}', 'destroy')->name('destroy');
});

Route::group(['prefix' => 'orders', 'as' => 'orders.', 'controller' => OrdersController::class],function(){
    Route::get('', 'index')->name('index');
    Route::get('order/{order}', 'show')->name('show');
    Route::put('update/{order}', 'update')->name('update');
    Route::get('order/{order}/assign', 'assign')->name('assign');
    Route::post('order/{order}/assign', 'assignEmployee')->name('assignEmployee');
});

Route::get('signout', SignOutController::class)->name('signout');
