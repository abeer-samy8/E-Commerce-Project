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
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SendMailController;


use App\Http\Controllers\HomeController as FrontHomeController;
use App\Http\Controllers\ProductsController as ProductsHomeController;



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

Route::get('/send_emails', [SendMailController::class, 'form'])->name('send_emails_form');
Route::post('/send_emails', [SendMailController::class, 'send_emails'])->name('send_emails');



Route::get('/page/{slug}',[FrontHomeController::class,'Page']);


Route::get('/contact-us', [ContactController::class,'contact']);
Route::post('/contact-us', [ContactController::class,'contactus'])->name('contactus');


Route::get('/stores',[FrontHomeController::class,'stores']);
Route::get('/categories',[FrontHomeController::class,'categories']);
Route::get('/sales',[FrontHomeController::class,'sales']);
Route::get('/services', [FrontHomeController::class,'services']);
Route::get('/about-us', [FrontHomeController::class,'aboutUs']);


Route::get('/products/cart', [CartController::class,'cart']);
Route::get('/products/add-to-cart/{id}', [CartController::class,'addToCart'])->name('add-to-cart');
Route::post('/products/post-cart', [CartController::class,'postCart'])->name('post-cart');
Route::get('/products/remove-from-cart/{id}', [CartController::class,'removeFromCart'])->name('remove-from-cart');
Route::get('/checkout', [CartController::class,'check']);
Route::post('/checkout', [CartController::class,'checkout'])->name('checkout');


Route::get('/thankyou', [CartController::class,'thankyou']);
Route::get('/search', [ProductsHomeController::class,'search'])->name('products.search');

Route::get('/products', [ProductsHomeController::class,'index']);
Route::get('/products/{slug}', [ProductsHomeController::class,'details'])->name("product.details");
Route::get('/categories', [ProductsHomeController::class,'categories']);
Route::get('/category-products/{id}', [ProductsHomeController::class,'categoryProducts']);

Route::get('/stores', [ProductsHomeController::class,'stores']);
Route::get('/store-products/{id}', [ProductsHomeController::class,'storeProducts']);





//Add subscriber email
Route::post('/add-subscriber-email', [NewsletterController::class,'addSubscriber']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix("admin")->middleware(['auth','role:admin','links.permissions'])->group(function(){
    Route::get("/",[HomeController::class,'index'])->name("home");

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete("category/delete/{id}",[CategoryController::class,'destroy'])->name("category.delete");



    Route::get("product/{id}/activate",[ProductController::class,'activate'])->name("products.activate");
    Route::resource("product",ProductController::class);
    Route::get("product/{id}/delete",[ProductController::class,'destroy'])->name("product.delete");

    Route::resource("store",StoreController::class);
    Route::get("store/{id}/delete",[StoreController::class,'destroy'])->name("store.delete");

    Route::resource("currency",CurrencyController::class);
    Route::get("currency/{id}/delete",[CurrencyController::class,'destroy'])->name("currency.delete");

    Route::resource("static-page",StaticPageController::class);
    Route::get("static-page/{id}/delete",[StaticPageController::class,'destroy'])->name("static-page.delete");

    Route::resource("testimonial",TestimonialController::class);
    Route::get("testimonial/{id}/delete",[TestimonialController::class,'destroy'])->name("testimonial.delete");

    Route::resource("slider",SliderController::class);
    Route::get("slider/{id}/delete",[SliderController::class,'destroy'])->name("slider.delete");

    Route::resource("customer",CustomerController::class);
    Route::get("customer/{id}/delete",[CustomerController::class,'destroy'])->name("customer.delete");

    Route::post("order/update-status/{id}",[OrderController::class,'updateStatus'])->name("order.updateStatus");
    Route::resource("order",OrderController::class);
    Route::get("order/{id}/delete",[OrderController::class,'destroy'])->name("order.delete");

    Route::resource("service",ServiceController::class);
    Route::get("service/{id}/delete",[ServiceController::class,'destroy'])->name ("service.delete");


    Route::resource("user",UserController::class);
    Route::get("user/{id}/links",[UserController::class,'links'])->name("users.links");
    Route::post("user/{id}/links",[UserController::class,'postLinks'])->name("users.post-links");
    Route::get("user/{id}/delete",[UserController::class,'destroy'])->name("users.delete");

    Route::get("change-pass",[ChangePasswordController::class,'edit'])->name("password.edit");
    Route::post("change-pass",[ChangePasswordController::class,'update'])->name("password.changed");
    Route::get("profile",[UserProfileController::class,'edit'])->name("profile.edit");
    Route::put("profile",[UserProfileController::class,'update'])->name("profile.update");




});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
