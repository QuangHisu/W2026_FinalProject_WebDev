<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shipments.index');
});

Route::get('/orders/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/update', [OrderController::class, 'update'])->name('orders.update');
Route::get('/shipments/edit', [ShipmentController::class, 'edit'])->name('shipments.edit');
Route::put('/shipments/update', [ShipmentController::class, 'update'])->name('shipments.update');

Route::resource('orders', OrderController::class)->except(['edit', 'update']);
Route::resource('customers', CustomerController::class);
Route::resource('shipments', ShipmentController::class)->except(['edit', 'update']);
Route::resource('orderItems', OrderItemController::class);

