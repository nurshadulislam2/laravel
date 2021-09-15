<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'dashboard']);

Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
Route::get('/products/create', [ProductsController::class, 'create'])->name('admin.product.create');
Route::post('/products/create', [ProductsController::class, 'store'])->name('admin.product.store');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('admin.product.edit');
Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
Route::delete('/products/delete/{id}', [ProductsController::class, 'delete'])->name('admin.product.delete');
