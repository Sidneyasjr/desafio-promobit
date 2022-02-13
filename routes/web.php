<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::middleware('auth')->group(function () {
    //Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Routes Products
    Route::get('/produtos', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/produtos/cadastrar', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/produtos', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/produtos/{product}/editar', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/produtos/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/produtos/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
});


