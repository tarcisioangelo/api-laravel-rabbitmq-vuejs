<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AuthController;

/**
 * Login
 * -------------------------------------------------------------------
 */
Route::post('/login', [AuthController::class, 'login']);

/**
 * Usuários
 * -------------------------------------------------------------------
 */
Route::post('/users', [UserController::class, 'store']);

Route::group(['middleware' => ['authJwt']], function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/find/{id}', [UserController::class, 'find']);
});

/**
 * Produtos
 * -------------------------------------------------------------------
 */
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/find/{id}', [ProductsController::class, 'find']);

Route::group(['middleware' => ['authJwt']], function () {
    Route::post('/products', [ProductsController::class, 'store']);
    Route::delete('/products/{id}', [ProductsController::class, 'delete']);
});

/**
 * Compras
 * -------------------------------------------------------------------
 */
Route::group(['middleware' => ['authJwt']], function () {
    Route::get('/purchase', [PurchaseController::class, 'index']);
    Route::post('/purchase', [PurchaseController::class, 'store']);
});

