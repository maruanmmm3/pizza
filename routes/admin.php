<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PedidoController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit' , 'update'])->names('admin.users');


Route::resource('categorias', CategoriaController::class)->names('admin.categorias');

Route::resource('producto', ProductoController::class)->names('admin.productos');

Route::resource('pedido', PedidoController::class)->names('admin.pedidos');

Route::get('productos.export', [ProductoController::class ,'export'])->name('productos.export');

