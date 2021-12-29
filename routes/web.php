<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search']);
Route::get('/product/{product_id}/view', [ProductController::class, 'view']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginIndex']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerIndex']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::get('/{id}/update', [CartController::class, 'update']);
        Route::post('/add', [CartController::class, 'add']);
        Route::post('/delete', [CartController::class, 'delete']);

        Route::get('/checkout', [CartController::class, 'checkout']);
    });

    Route::get('/transaction', [TransactionController::class, 'index']);

    // admin
    Route::middleware('admin')->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/{id}/delete', [ProductController::class, 'deleteProduct']);
            Route::get('/{id}/update', [ProductController::class, 'updateIndex']);
            Route::post('/{id}/update', [ProductController::class, 'updateProduct']);
            Route::get('/new', [ProductController::class, 'addIndex']);
            Route::post('/new', [ProductController::class, 'addProduct']);
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/new', [CategoryController::class, 'addIndex']);
            Route::post('/new', [CategoryController::class, 'addCategory']);
            Route::get('/{id}/update', [CategoryController::class, 'updateIndex']);
            Route::post('/update', [CategoryController::class, 'updateCategory']);
            Route::get('{id}/delete', [CategoryController::class, 'deleteCategory']);
        });
    });
});
