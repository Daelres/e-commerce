<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

//Pagina principal
Route::get('/', [ProductController::class, 'index'])->name('product.index');
//Página de detalle de producto
Route::get('product/{idProducto}/{category?}', [ProductController::class, 'getProduct'])->name('product.getProduct');
//Rutas de autenticación
Auth::routes();
//Página principal post login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el área de administración
Route::prefix('admin')->group(function () {
    //Página principal del admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // PRODUCTS
    Route::get('products', [ProductController::class, 'getProducts'])->name('admin.product.index');
    Route::get('products/create', [ProductController::class, 'getLists'])->name('product.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    // CATEGORIES
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // BRANDS
    Route::get('brands', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('brands/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('brands/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('brands/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('brands/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
});
