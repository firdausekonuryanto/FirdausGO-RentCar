<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserloginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserloginController::class, 'login'])->name('login');
Route::post('login', [UserloginController::class, 'authenticate']);
Route::post('logout', [UserloginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [UserloginController::class, 'home']);
    Route::get('dashboard', [UserloginController::class, 'dashboard']);
    Route::get('transaksi', [UserloginController::class, 'transaksi']);
    Route::post('transaksi', [UserloginController::class, 'transaksi_sewa']);
    Route::post('transaksi_save', [UserloginController::class, 'transaksi_save']);
    Route::get('semuapenonton', [UserloginController::class, 'semuapenonton']);
    Route::get('validasitiket', [UserloginController::class, 'validasitiket']);
    Route::post('check_in', [UserloginController::class, 'check_in']);
});

Route::resource('penyewa', PenyewaController::class)->only('create', 'store');
Route::resource('penyewa', 'PenyewaController')->only(['index', 'show', 'update', 'destroy'])->middleware('auth');
Route::resource('mobils', MobilController::class);

