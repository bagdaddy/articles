<?php

use App\Http\Middleware\EnsureUserSubscriptionValid;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/articles');
});

Auth::routes();

Route::get('/expired', [App\Http\Controllers\HomeController::class, 'expired'])->name('expired');

//Route::get('/list', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([EnsureUserSubscriptionValid::class])->group(function () {
    Route::get('/articles', [App\Http\Controllers\HomeController::class, 'index'])->name('articles');
    Route::get('/articles/{id}', [\App\Http\Controllers\HomeController::class, 'show']);
});
