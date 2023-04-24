<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CurrencyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->group(function(){
    Route::get('/', [HomeController::class, 'index']);

    Route::resource("category",CategoryController::class);
    Route::get("category/{id}/delete",[CategoryController::class,'destroy'])->name("category.delete");

    Route::resource("product",ProductController::class);
    Route::get("product/{id}/delete",[ProductController::class,'destroy'])->name("product.delete");

    Route::resource("store",StoreController::class);
    Route::get("store/{id}/delete",[StoreController::class,'destroy'])->name("store.delete");

    Route::resource("currency",CurrencyController::class);
    Route::get("currency/{id}/delete",[CurrencyController::class,'destroy'])->name("currency.delete");


});

