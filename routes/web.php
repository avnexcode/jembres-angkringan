<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::middleware(['guest', 'auth'])->group(function () {
});

Route::get('/', [HomeController::class, "index"])->name('page.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/receipt',[ReceiptController::class, "store"])->name('receipt.store');
    Route::delete('/receipt',[ReceiptController::class, "destroy"])->name('receipt.destroy');
    Route::get('/cart',[CartController::class, "show"])->name('cart.detail');
    Route::post('/cart',[CartController::class, "store"])->name('cart.store');
});

Route::middleware(['auth', 'verified', CheckRole::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/dashboard/history', [DashboardController::class, 'history'])->name('history');
    Route::get('/dashboard/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/dashboard/menu/create', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/dashboard/menu/edit/{menu:slug}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::patch('/dashboard/menu/edit/{slug}', [MenuController::class, 'update'])->name('menu.update');
    Route::put('/dashboard/menu/edit', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/dashboard/menu', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('/dashboard/menu/create/checkSlug', [MenuController::class, 'checkSlug']);
    Route::get('/dashboard/note', [DashboardController::class, "note"])->name('note');

});

require __DIR__.'/auth.php';
