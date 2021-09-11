<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\UserCryptocurrenciesWalletController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

//Admin routes
Route::resource('cryptocurrencies', CryptocurrencyController::class);
Route::resource('users', UserController::class);
Route::resource('roles', RolesController::class);
Route::get('/cryptocurrencies/deleteImage/{id}', [CryptocurrencyController::class, 'deleteImage']);
Route::get('/cryptocurrenciesjson', [HomeController::class, 'convertIntoJson']);

//User routes
Route::resource('wallets', UserCryptocurrenciesWalletController::class);
Route::get('wallets/sell/{id}', [UserCryptocurrenciesWalletController::class, 'sellWallet']);
Route::get('wallets/buy/{id}', [UserCryptocurrenciesWalletController::class, 'addToWallet']);
Route::get('account', [HomeController::class, 'editCustomerInfo']);
Route::put('account/update', [HomeController::class, 'updateCustomerInfo'])->name('account.update');





