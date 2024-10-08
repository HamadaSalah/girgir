<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceProviderController;
use App\Models\Category;
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

Route::get('', HomeController::class)->name('home');
Route::get('category/{category:uuid}',[CategoryController::class,'show'])->name('category.show')->whereUuid('category');

Route::group(['prefix' => 'p'], function(){
    Route::group(['as' => 'provider.','prefix' => '{provider:uuid}', 'controller' => ServiceProviderController::class] , function()
    {
        Route::get('','index')->name('index');
        Route::get('reviews','reviews')->name('reviews');
        Route::get('packages','packages')->name('packages');
        Route::get('services','services')->name('services');
        Route::get('location','location')->name('location');
        Route::get('about','about')->name('about');
    });
});

Route::get('search', SearchController::class)->name('search');

Route::get('test-view',function()
{
    return view('auth.login');
});