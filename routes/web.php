<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockQuoteController;
use App\Http\Controllers\SocialLoginController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/redirect', [SocialLoginController::class, 'authRedirect'])->name('facebook-login');
Route::get('/auth/callback', [SocialLoginController::class, 'authCallBack']);

Route::controller(StockQuoteController::class)->group(function () {
    Route::get('/stock_quotes', 'index');
    Route::post('/stock_quotes/store', 'store');
});

Route::middleware(['auth', 'verified'])->group(function () {
});

Route::post('/test', function(){
    return "testing post";
});

require __DIR__.'/auth.php';
