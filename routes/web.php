<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;

use App\Http\Controllers\CryptocurrencyChartController;
use App\Http\Controllers\UserController;
<<<<<<< HEAD
=======

use App\Http\Controllers\UserCryptocurrencyWalletController;
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
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

<<<<<<< HEAD
Route::get('/', function () {
=======
Route::get('/test', function () {
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
 
    return view('welcome');
});
Route::resource('cryptocurrencies', CryptocurrencyController::class);
<<<<<<< HEAD

=======
Route::resource('wallets', UserCryptocurrencyWalletController::class);

Route::get('wallets/sell/{id}', [UserCryptocurrencyWalletController::class, 'sellWallet']);

Route::get('wallets/buy/{id}', [UserCryptocurrencyWalletController::class, 'addToWallet']);
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
Route::get('chartjs', [CryptocurrencyChartController::class, 'index']);
Route::resource('users', UserController::class);
Auth::routes();

<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jsontest', [App\Http\Controllers\HomeController::class, 'jsontest']);
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
