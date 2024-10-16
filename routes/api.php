<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Panier\ShoppingCartController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name("user.register");
    Route::post('/login', [UserController::class, 'login'])->name("user.login");
});

Route::get('/categories', [CategoryController::class, 'index'])->name("category.all");
Route::get('/products', [ProductController::class, 'index'])->name("product.all");
Route::get('/products/bycategory/{id}', [ProductController::class, 'produitParCategorie']);
Route::get('/products/category/{id}', [ProductController::class, 'fiveProduits']);
Route::get('/logout', [UserController::class, 'logout'])->name("user.logout");



Route::middleware('auth:sanctum')->group(function () {

    Route::post('/categorie/create', [CategoryController::class, 'store'])->name("category.store");
    Route::put('/categorie/edit/{category}', [CategoryController::class, 'update'])->name("category.update");


    Route::get('/product/{product}', [ProductController::class, 'show'])->name("product.show");
    Route::post('/product/create', [ProductController::class, 'store'])->name("product.store");
    Route::put('/product/edit/{product}', [ProductController::class, 'update'])->name("product.update");
    Route::delete('/product/delete/{product}', [ProductController::class, 'destroy'])->name("product.delete");

    // Les routes du panier
    Route::middleware('web')->group(function () {
        Route::get('/panier/all', [ShoppingCartController::class, 'showCart'])->name('');
        Route::post('/panier/add', [ShoppingCartController::class, 'addToCart'])->name('');
        Route::delete('/panier/delete/{id}', [ShoppingCartController::class, 'deleteCart'])->name('');
        Route::get('/panier/vider', [ShoppingCartController::class, 'vider'])->name('');
    });
});
