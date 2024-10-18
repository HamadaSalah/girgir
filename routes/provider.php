<?php

use App\Http\Controllers\Provider\{AboutController, HomeController, LocationController, OrdersController, PackagesController , ProfileController, ReviewsController, SignOutController, WithdrawalController};
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


Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');
Route::put('updateProfilePicture', [ProfileController::class , 'updateProfilePicture'])->name('updateProfilePicture');

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


Route::group(['prefix' => 'withdrawal' , 'as' => 'withdrawal.', 'controller' => WithdrawalController::class],function(){
    Route::get('', 'create')->name('create');
    Route::post('', 'store')->name('store');
});


Route::get('about', [AboutController::class, 'index'])->name('about');
Route::post('about', [AboutController::class, 'update'])->name('about.update');

Route::get('location', [LocationController::class, 'index'])->name('location');
Route::post('location', [LocationController::class, 'update'])->name('location.update');

Route::get('reviews', [ReviewsController::class, 'index'])->name('reviews');

Route::get('signout', SignOutController::class)->name('signout');
