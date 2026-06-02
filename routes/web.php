<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController; 

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
| SOLUSI ERROR: Penjinak Middleware Auth Bawaan Laravel
|--------------------------------------------------------------------------
| Rute di bawah ini wajib ada untuk mengalihkan rute default 'login' bawaan 
| Laravel langsung ke halaman login admin, sehingga tidak memicu error
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


/*
|--------------------------------------------------------------------------
| Web Routes Admin Panel (Grouping & Proteksi Middleware)
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    // Rute Login khusus Admin Panel
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Mengamankan Rute Administrasi di Balik Tembok Middleware
    Route::middleware(['auth'])->group(function () {
        
        // Halaman Utama Dashboard Admin
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // CRUD Modul Event
        Route::resource('events', AdminEventController::class);
        
        // CRUD Modul Kategori
        Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
        
        // CRUD Modul Partner
        Route::resource('partners', PartnerController::class);
        
        // Laporan Transaksi Admin
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
        
    });
});