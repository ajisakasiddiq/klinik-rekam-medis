<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware();


Route::resource('user', 'App\Http\Controllers\UserController')->middleware('auth');
Route::resource('pasien', 'App\Http\Controllers\PasienController')->middleware('auth');
Route::resource('kunjungan', 'App\Http\Controllers\KunjunganController')->middleware('auth');
Route::resource('pemeriksaan', 'App\Http\Controllers\PemeriksaanController')->middleware('auth');
Route::resource('tindakan', 'App\Http\Controllers\TindakanController')->middleware('auth');
Route::resource('obat', 'App\Http\Controllers\ObatController')->middleware('auth');
Route::resource('pemeriksaandokter', 'App\Http\Controllers\PemeriksaandokterController')->middleware('auth');
Route::resource('rekammedis', 'App\Http\Controllers\RekammedisController')->middleware('auth');
Route::resource('resepobat', 'App\Http\Controllers\ResepobatController')->middleware('auth');
Route::resource('supplier', 'App\Http\Controllers\SupplierController')->middleware('auth');