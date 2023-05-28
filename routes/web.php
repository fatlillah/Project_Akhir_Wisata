<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanTiketWisataController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\WisataController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pesan-tiket-wisata/{id}', [PesanTiketWisataController::class, 'pesanTiket'])->name('pesanTiket');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('wisata', WisataController::class);
    Route::resource('tiket', TiketController::class);
    Route::resource('users', UserController::class);
});
