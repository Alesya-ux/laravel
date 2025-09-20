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

// Маршруты для корзины
Route::controller(\App\Http\Controllers\CartController::class)->prefix('cart')->group(function () {
    Route::get('/', 'index')->name('cart');
    Route::post('/add', 'add')->name('cart.add');
    Route::post('/update/{cartItem}', 'update')->name('cart.update');
    Route::delete('/remove/{cartItem}', 'remove')->name('cart.remove');
    Route::delete('/clear', 'clear')->name('cart.clear');
});

// Тестовый маршрут для проверки AJAX
Route::post('/test-ajax', function() {
    return response()->json(['success' => true, 'message' => 'AJAX работает!']);
});

// Тестовый маршрут для проверки обновления корзины
Route::put('/test-cart-update/{id}', function($id) {
    return response()->json([
        'success' => true, 
        'message' => 'Тестовый маршрут работает!',
        'item_id' => $id
    ]);
});

// Тестовый маршрут для проверки таблицы корзины
Route::get('/test-cart-table', function() {
    try {
        $count = \App\Models\CartItem::count();
        return response()->json(['success' => true, 'message' => "Таблица cart_items существует, записей: {$count}"]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Ошибка: ' . $e->getMessage()]);
    }
});




Route::controller(Controllers\CatalogController::class)->prefix('catalog')->group(function () {
    Route::get('/', 'getIndex');
    Route::get('{catalog}', 'getOne');
    Route::get('{catalog}/add_product', 'getAddProduct');
    Route::get('{catalog}/detach_product', 'getDetachProduct');
});

Route::controller(Controllers\ProductsController::class)->prefix('product')->group(function () {
    Route::get('/', 'getIndex');
    Route::get('{product}', 'getOne');
});



require __DIR__ . '/auth.php';
//всегда в конце
Route::get('{url}', [Controllers\BaseController::class, 'getUrl']);

