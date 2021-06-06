<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
//    return view('welcome');
});

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/***
 * User Profile
 */
Route::get('account/settings', [App\Http\Controllers\AccountsController::class, 'edit'])->name('account.settings');
Route::put('account/settings', [App\Http\Controllers\AccountsController::class, 'update'])->name('account.settings.update');
