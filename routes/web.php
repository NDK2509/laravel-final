<?php

use App\Core\Mail;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Page\CartController;
use App\Http\Controllers\Page\CheckoutController;
use App\Http\Controllers\Page\PaymentControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminLogedIn;

Route::get("/test", function() {
    Mail::send("ky.nguyen23@student.passerellesnumeriques.org", "Test", view("mails.reset-password", ["user" => "NDK", "resetPwdToken" => "abc"])->render());
    return "success";
});
Route::get('/', [PageController::class, 'index']);
Route::get('/type/{id}', [PageController::class, 'getProductsByType']);

Route::get('/detail/{id}', [PageController::class, 'detail']);

// ----------------- TRANG ADMIN ---------------
Route::prefix("/admin/")->group(function() {
    Route::get("login", fn() => view("admin.login"));
    Route::post("login", [AdminController::class, "login"])->name("adminLogin");
    Route::prefix("")->middleware(AdminLogedIn::class)->group(function() {
        Route::get("", [ProductController::class, "index"])->name("adminIndex");
        Route::get("create", fn () => view("admin.product.create"))->name("createProduct");
        Route::post("create", [ProductController::class, "create"])->name("postCreateProduct");
        Route::get("edit/{id}", [ProductController::class, "edit"])->name("editProduct");
        Route::post("edit/{id}", [ProductController::class, "update"])->name("updateProduct");
    });
});

//---------------- CART ---------------
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [CartController::class, 'deleteItem'])->name('xoagiohang');

//------------------------- Login, Logout, Register ---------------------------------//

Route::prefix("/register")->group(function() {
    Route::get("", function () {
        return view('users.register');
    });
    Route::post("", [UserController::class, 'Register']);
});
Route::prefix("/login")->group(function() {
    Route::get("", function () {
        return view('users.login');
    });
    Route::post("", [UserController::class, 'login']);
});
Route::get('/logout', [UserController::class, 'logout']);
Route::prefix("/reset-password")->group(function() {
    Route::get("", [UserController::class, "verifyResetPwdRequest"]);
    Route::post("", [UserController::class, "resetPassword"])->name("resetPassword");
});
Route::prefix("/update-password")->group(function() {
    Route::post("", [UserController::class, "updatePassword"])->name("updatePassword");
});
//-----------------checkout----------------------
Route::get('check-out', [CheckoutController::class, 'get'])->name('dathang');
Route::post('check-out', [CheckoutController::class, 'post'])->name('dathang');
//vnpay
Route::prefix("/payment/")->group(function() {
    Route::get("", [PaymentControler::class, "index"])->name("paymentIndex");
    Route::post("create", [PaymentControler::class, "create"])->name("createPayment");
    Route::get("return", [PaymentControler::class, "vnPayReturn"])->name("vnPayReturn");
});
