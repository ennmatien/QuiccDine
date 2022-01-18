<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
});

Route::get('/', [PelangganController::class, 'welcome']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::prefix('vendor')->middleware('auth')->group(function () {
    Route::get('/profile', [VendorController::class, 'index'])->name('vendor.profile');
    Route::post('/profile', [VendorController::class, 'store'])->name('vendor.post');
    Route::get('/transaction', [VendorController::class, 'transaction' ])->name('vendor.transaction');
    Route::get('/bill/{id}', [VendorController::class, 'bill' ])->name('vendor.bill');
    Route::get('/bill/add/{id}', [VendorController::class, 'createBill' ])->name('vendor.addBill');
    Route::post('/bill/add/{id}', [VendorController::class, 'storeBill' ])->name('vendor.addBill');
    Route::post('/bill/sendBill/{id}', [VendorController::class, 'sendBill' ])->name('vendor.sendBill');
    Route::delete('/bill/delete/{id}', [VendorController::class, 'deleteBill' ])->name('vendor.deleteBill');
    Route::delete('/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.delete');
    Route::get('/transaction/{id}', [VendorController::class, 'show'])->name('vendor.show');
    Route::put('/transaction/{id}', [VendorController::class, 'update'])->name('vendor.update');
});

Route::prefix('pelanggan')->middleware('auth')->group(function () {
    Route::get('/profile', [PelangganController::class, 'index'])->name('pelanggan.profile');
    Route::post('/profile', [PelangganController::class, 'store'])->name('pelanggan.post');
    Route::get('/booking', [PelangganController::class, 'booking' ])->name('pelanggan.booking');
    Route::get('/transaction', [PelangganController::class, 'transaction' ])->name('pelanggan.transaction');
    Route::get('/create/{id?}', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::get('/restaurant/{id}', [PelangganController::class, 'restaurant'])->name('pelanggan.restaurant');
    Route::get('/bill/{id}', [PelangganController::class, 'bill'])->name('pelanggan.bill');
    Route::get('/payment/{id}', [PelangganController::class, 'payment'])->name('pelanggan.payment');
    Route::post('/create', [PelangganController::class, 'pesan'])->name('pelanggan.pesan');
    Route::get('/transaction/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
    Route::put('/transaction/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/delete/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');
    Route::delete('/transaction/{id}', [PelangganController::class, 'deleteT'])->name('pelanggan.deleteTransaction');
    Route::get('/reviews/{id}', [PelangganController::class, 'review'])->name('pelanggan.review');
    Route::post('/reviews', [PelangganController::class, 'reviews'])->name('pelanggan.reviews');
});
