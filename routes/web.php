<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;

use App\Http\Controllers\CryptocurrencyChartController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserCryptocurrencyWalletController;
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

Route::get('/test', function () {
 
    return view('welcome');
});
Route::resource('cryptocurrencies', CryptocurrencyController::class);
Route::resource('wallets', UserCryptocurrencyWalletController::class);

Route::get('wallets/sell/{id}', [UserCryptocurrencyWalletController::class, 'sellWallet']);

Route::get('wallets/buy/{id}', [UserCryptocurrencyWalletController::class, 'addToWallet']);
Route::get('chartjs', [CryptocurrencyChartController::class, 'index']);
Route::resource('users', UserController::class);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jsontest', [App\Http\Controllers\HomeController::class, 'convertIntoJson']);
