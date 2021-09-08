<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\UserCryptocurrencyWalletController;

use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\CryptocurrencyController;
use App\Http\Controllers\Admin\UserController;



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

Route::resource('cryptocurrencies', CryptocurrencyController::class);
Route::resource('wallets', UserCryptocurrencyWalletController::class);
Route::resource('users', UserController::class);
Route::resource('roles', RolesController::class);


Route::get('wallets/sell/{id}', [UserCryptocurrencyWalletController::class, 'sellWallet']);
Route::get('wallets/buy/{id}', [UserCryptocurrencyWalletController::class, 'addToWallet']);
Route::get('chartjs', [CryptocurrencyChartController::class, 'index']);
Route::get('/cryptocurrencies/deleteImage/{id}', [CryptocurrencyController::class, 'deleteImage']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cryptocurrenciesjson', [App\Http\Controllers\HomeController::class, 'convertIntoJson']);
