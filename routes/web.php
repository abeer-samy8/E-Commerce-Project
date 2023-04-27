<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\HomeController as FrontHomeController;



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


Route::get('/',[FrontHomeController::class,'index']);
Route::get('/page/{slug}',[FrontHomeController::class,'Page']);
Route::get('/contact-us',[FrontHomeController::class,'contactUs']);
Route::get('/about-us',[FrontHomeController::class,'aboutUs']);
Route::get('/stores',[FrontHomeController::class,'stores']);
Route::get('/categories',[FrontHomeController::class,'categories']);
Route::get('/sales',[FrontHomeController::class,'sales']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::resource("category",CategoryController::class);
    Route::get("category/{id}/delete",[CategoryController::class,'destroy'])->name("category.delete");

    Route::resource("product",ProductController::class);
    Route::get("product/{id}/delete",[ProductController::class,'destroy'])->name("product.delete");

    Route::resource("store",StoreController::class);
    Route::get("store/{id}/delete",[StoreController::class,'destroy'])->name("store.delete");

    Route::resource("currency",CurrencyController::class);
    Route::get("currency/{id}/delete",[CurrencyController::class,'destroy'])->name("currency.delete");

    Route::resource("static-page",StaticPageController::class);
    Route::get("static-page/{id}/delete",[StaticPageController::class,'destroy'])->name("static-page.delete");

    Route::resource("slider",SliderController::class);
    Route::get("slider/{id}/delete",[SliderController::class,'destroy'])->name("slider.delete");

    Route::resource("customer",CustomerController::class);
    Route::get("customer/{id}/delete",[CustomerController::class,'destroy'])->name("customer.delete");

    Route::post("order/update-status/{id}",[OrderController::class,'updateStatus'])->name("order.updateStatus");
    Route::resource("order",OrderController::class);
    Route::get("order/{id}/delete",[OrderController::class,'destroy'])->name("order.delete");

    Route::resource("user",UserController::class);
    Route::get("user/{id}/delete",[UserController::class,'destroy'])->name("users.delete");

    Route::get("change-pass",[ChangePasswordController::class,'edit'])->name("password.edit");
    Route::post("change-pass",[ChangePasswordController::class,'update'])->name("password.changed");
    Route::get("profile",[UserProfileController::class,'edit'])->name("profile.edit");
    Route::put("profile",[UserProfileController::class,'update'])->name("profile.update");




});

