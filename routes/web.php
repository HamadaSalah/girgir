<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('logout', function () {
    auth()->logout();

    return redirect()->route('home');
})->name('logout');

Route::get('test-mail', function()
{
    $user = \App\Models\User::find(4);
    return view('mail.test',compact('user'));
});
