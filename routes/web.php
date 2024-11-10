<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\OrderItemController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');



Route::apiResource('products', ProductController::class);



Route::apiResource('inventories', InventoryController::class);



Route::apiResource('warehouses', WarehouseController::class);



Route::apiResource('purchase-orders', PurchaseOrderController::class);



Route::apiResource('order-items', OrderItemController::class);


require __DIR__.'/auth.php';
