<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

    //Rutas para parametrización del sistema
    ///Vista de creación de categorías
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    ///Vista de creación de productos
    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
    ///Creación nuevo producto
    Route::post('products/store', [ProductController::class, 'store'])->name('admin.product.store');

    ///TODO: Documentar rutas
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('products', [ProductController::class, 'store'])->name('product.store');
});
