<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController;

/*
|--------------------------------------------------------------------------
| Web Routes Frontend / Umum
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');


/*
|--------------------------------------------------------------------------
| Web Routes Admin Panel (CRUD Terpusat di Sini)
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Dashboard Utama Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Modul Event
    Route::resource('events', AdminEventController::class);
    
    // CRUD Modul Kategori (Soal 1)
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
    
    // CRUD Modul Partner (Soal 2 - Sekarang Mendukung Penuh Create, Read, Update, Delete)
    Route::resource('partners', PartnerController::class);
    
    // Laporan Transaksi
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});