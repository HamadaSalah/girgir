<?php

use App\Http\Controllers\Provider\{AboutController, ChatController, HomeController, LocationController, OrdersController, PackagesController , ProfileController, ReviewsController, ServicesController, SignOutController, WithdrawalController , EmployeesController};
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

Route::group(['prefix' => 'services' , 'as' => 'services.', 'controller' => ServicesController::class],function(){
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('service/{service}', 'show')->name('show');
    Route::get('edit/{service}', 'edit')->name('edit');
    Route::put('update/{service}', 'update')->name('update');
    Route::delete('service/{service}', 'destroy')->name('destroy');
});

Route::group(['prefix' => 'orders', 'as' => 'orders.', 'controller' => OrdersController::class],function(){
    Route::get('', 'index')->name('index');
    Route::get('order/{order}', 'show')->name('show');
    Route::get('response/{order}', 'response')->name('response');
    Route::put('update/{order}', 'update')->name('update');
    Route::get('order/{order}/assign', 'assign')->name('assign')->middleware('companyProvider');
    Route::post('order/{order}/assign', 'assignEmployee')->name('assignEmployee')->middleware('companyProvider');
});

Route::group(['prefix' => 'employees' , 'as' => 'employees.', 'controller' => EmployeesController::class , 'middleware' => 'companyProvider'],function()
{
    Route::get('','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('create','store')->name('store');
    Route::get('edit/{employee}', 'edit')->name('edit');
    Route::put('update/{employee}', 'update')->name('update');
    Route::delete('employee/{employee}', 'destroy')->name('destroy');
});

Route::group(['prefix' => 'withdrawal' , 'as' => 'withdrawal.', 'controller' => WithdrawalController::class],function(){
    Route::get('', 'create')->name('create');
    Route::post('', 'store')->name('store');
});
Route::group(['prefix' => 'chat' , 'as' => 'chat.', 'controller' => ChatController::class],function(){
    Route::get('', 'index')->name('index');
    Route::post('', 'store')->name('store');
});


Route::get('about', [AboutController::class, 'index'])->name('about');
Route::post('about', [AboutController::class, 'update'])->name('about.update');

Route::get('location', [LocationController::class, 'index'])->name('location');
Route::post('location', [LocationController::class, 'update'])->name('location.update');

Route::get('reviews', [ReviewsController::class, 'index'])->name('reviews');

Route::get('signout', SignOutController::class)->name('signout');

