<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceProviderController;
use App\Models\Category;
use App\Models\File;
use App\Models\Withdrawal;
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

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('category/{category:uuid}',[CategoryController::class,'show'])->name('category.show')->whereUuid('category');
Route::get('search', [HomeController::class,'search'])->name('search');
Route::get('category/{category}', [HomeController::class,'category'])->name('category');


Route::get('providers', [HomeController::class,'providers'])->name('providers');
Route::get('providers/{provider}', [HomeController::class,'showProvider'])->name('provider.show');
Route::get('providers/{provider}/packages', [HomeController::class,'providerPackage'])->name('provider.packages');
Route::get('providers/{provider}/about', [HomeController::class,'aboutProvider'])->name('provider.about');
Route::get('packages/{package}', [HomeController::class,'showPackage'])->name('package');
Route::post('addToCard', [HomeController::class,'addToCard'])->name('addToCard');
Route::get('mycart', [HomeController::class,'myCart'])->name('myCart');
Route::delete('deleteCart/{cart}', [HomeController::class,'deleteMyCart'])->name('deleteMyCart');
Route::post('checkout', [HomeController::class,'checkout'])->name('checkout');
Route::get('orders', [HomeController::class,'orders'])->name('orders');
Route::get('orderDetails/{invoice_number}', [HomeController::class,'orderDetails'])->name('orderDetails');

// Route::group(['prefix' => 'p'], function(){
//     Route::group(['as' => 'provider.','prefix' => '{provider:uuid}', 'controller' => ServiceProviderController::class] , function()
//     {
//         Route::get('','index')->name('index');
//         Route::get('reviews','reviews')->name('reviews');
//         Route::get('packages','packages')->name('packages');
//         Route::get('services','services')->name('services');
//         Route::get('location','location')->name('location');
//         Route::get('about','about')->name('about');
//     });
// });

// Route::get('search', SearchController::class)->name('search');

Route::get('test-view',function()
{
    $user = App\Models\User::first();
    return view('emails.user-created', compact('user'));
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
