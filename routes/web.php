<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemListController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// with React
Route::resource('items', ItemController::class);

//without React
Route::get('items-list', [ItemListController::class, 'index'])->name('items-list.index');
Route::get('items-list/create', [ItemListController::class, 'create'])->name('items-list.create');
Route::post('items-list', [ItemListController::class, 'store'])->name('items-list.store');
Route::get('items-list/{item}/edit', [ItemListController::class, 'edit'])->name('items-list.edit');
Route::put('items-list/{item}', [ItemListController::class, 'update'])->name('items-list.update');
Route::delete('items-list/{item}', [ItemListController::class, 'destroy'])->name('items-list.destroy');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
