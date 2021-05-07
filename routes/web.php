<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;



Route::get('', [ProductoController::class, 'index'])->name('productos.index');
Route::get('carta', [CartController::class, 'index'])->name('productos.carta');

Route::get('categoria/{categoria}', [ProductoController::class, 'categoria'])->name('productos.categoria');
Route::post('add_to_cart', [ProductoController::class, 'addToCart']);
Route::get('cartlist', [ProductoController::class, 'cartList'])->name('productos.cartlist');
Route::get('removecart/{id}', [ProductoController::class, 'removeCart']);
Route::get('ordernow', [ProductoController::class, 'orderNow']);
Route::post('add_to_pedido', [ProductoController::class, 'addToPedido'])->name('productos.addToPedido');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');