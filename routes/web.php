<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [Controllers\BaseController::class, 'getIndex']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(Controllers\CatalogController::class)->prefix('catalog')->group(function () {
    Route::get('/', 'getIndex');
    Route::get('{catalog}', 'getOne');
    Route::get('{catalog}/add_product', 'getAddProduct');
    Route::get('{catalog}/detach_product', 'getDetachProduct');
});

require __DIR__ . '/auth.php';
//всегда в конце
Route::get('{url}', [Controllers\BaseController::class, 'getUrl']);

