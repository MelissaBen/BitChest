<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;

use App\Http\Controllers\CryptocurrencyChartController;
use App\Http\Controllers\UserController;
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
Route::resource('cryptocurrencies', CryptocurrencyController::class);

Route::get('chartjs', [CryptocurrencyChartController::class, 'index']);
Route::resource('users', UserController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
