<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\customer\ProductController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\InvoiceController;
use App\Http\Controllers\customer\UserController;
use App\Http\Controllers\customer\FavouriteController;

use App\Http\Controllers\admin\CategoryController as AdCategoryController;
use App\Http\Controllers\admin\InvoiceController as AdInvoiceController;
use App\Http\Controllers\admin\InvoiceReceiptController as AdReceiptController;
use App\Http\Controllers\admin\ProductController as AdProductController;
use App\Http\Controllers\admin\UserController as AdUserController;

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




Route::get('/', [Controller::class, 'index'])->name('Home');

Route::get('/login', [UserController::class, 'registerForm'])->name('Login.form');

Route::post('/login', [UserController::class, 'login'])->name('Login');

Route::get('/register', [UserController::class, 'registerForm'])->name('Register.form');

Route::post('/register', [UserController::class, 'register'])->name('Register');

Route::group(['middleware' => 'user.auth.check', 'prefix' => null], function () {
    Route::post('/checkout', [InvoiceController::class, 'store'])->name('Checkout.post');
    Route::get('/signout', [UserController::class, 'logout'])->name('Logout');
    Route::get('/checkout', [InvoiceController::class, 'checkout'])->name('Checkout');
    Route::get('/myprofile', [UserController::class, 'myprofile'])->name('MyProfile');
    Route::post('/myprofile/updateinfo', [UserController::class, 'updateinfo'])->name('UpdateInfo');
    Route::post('/myprofile/updatepass', [UserController::class, 'updatepass'])->name('UpdatePass');

    //route của admin
    Route::group(['middleware' => 'bulkhead.check', 'prefix' => 'admin'], function () {
        //report
        Route::get('/', [AdminController::class, 'index'])->name('Dashboard');
        Route::get('/chart', [AdminController::class, 'chart'])->name('chart');

        //category
        Route::get('/manages/categories', [ AdCategoryController::class, 'index'])->name('categories.index');
        Route::get('/manages/categories/detail/{id?}', [ AdCategoryController::class, 'show'])->name('categories.detail');
        Route::get('/manages/categories/create', [ AdCategoryController::class, 'create'])->name('categories.create.form');
        Route::post('/manages/categories/create', [ AdCategoryController::class, 'store'])->name('categories.create');
        Route::get('/manages/categories/edit/{id?}', [ AdCategoryController::class, 'edit'])->name('categories.edit.form');
        Route::post('/manages/categories/edit/{id?}', [ AdCategoryController::class, 'update'])->name('categories.edit');
        Route::get('/manages/categories/delete/{id?}', [ AdCategoryController::class, 'destroy'])->name('categories.delete');
        Route::post('/manages/categories/change', [ AdCategoryController::class, 'change'])->name('categories.change');


        //receipt
        Route::get('/manages/receipts', [ AdReceiptController::class, 'index'])->name('receipts.index');
        Route::get('/manages/receipts/detail/{id?}', [ AdReceiptController::class, 'show'])->name('receipts.detail');

        Route::get('/receipts/import', [AdReceiptController::class, 'import'])->name('receipts.import');
        Route::post('/receipts/import', [AdReceiptController::class, 'store'])->name('receipts.import.create');
        Route::post('/add-to-list', [AdReceiptController::class, 'addToList'])->name('add-to-list');
        Route::post('/update-item', [AdReceiptController::class, 'updateItem'])->name('update-item');
        Route::get('/delete-item/{id?}', [AdReceiptController::class, 'deleteItem'])->name('delete-item');
        Route::get('/receipts/importlist', [AdReceiptController::class, 'importList'])->name('receipts.importlist');
        Route::get('/receipts/takelist', [ AdReceiptController::class, 'takeList'])->name('receipts.takelist');
        Route::get('/receipts/takelist/detail/{id?}', [ AdReceiptController::class, 'showTake'])->name('take.detail');
        Route::get('/receipts/takelist/check/{id?}', [ AdReceiptController::class, 'checkTake'])->name('take.check');


        //product
        Route::get('/manages/products', [ AdProductController::class, 'index'])->name('products.index');
        Route::get('/manages/products/detail/{id?}', [ AdProductController::class, 'show'])->name('products.detail');
        Route::get('/manages/products/create', [ AdProductController::class, 'create'])->name('products.create.form');
        Route::post('/manages/products/create', [ AdProductController::class, 'store'])->name('products.create');
        Route::get('/manages/products/edit/{id?}', [ AdProductController::class, 'edit'])->name('products.edit.form');
        Route::post('/manages/products/edit/{id?}', [ AdProductController::class, 'update'])->name('products.edit');
        Route::get('/manages/products/delete/{id?}', [ AdProductController::class, 'destroy'])->name('products.delete');

        //user
        Route::get('/manages/staffs', [AdUserController::class, 'index'])->name('staffs.index');
        Route::get('/manages/staffs/detail/{id?}', [AdUserController::class, 'show'])->name('staffs.detail');
        Route::get('/manages/staffs/create', [AdUserController::class, 'create'])->name('staffs.create.form');
        Route::post('/manages/staffs/create', [AdUserController::class, 'store'])->name('staffs.create');
        Route::get('/manages/staffs/edit/{id?}', [AdUserController::class, 'edit'])->name('staffs.edit.form');
        Route::post('/manages/staffs/edit/{id?}', [AdUserController::class, 'update'])->name('staffs.edit');
        Route::get('/manages/staffs/delete/{id?}', [AdUserController::class, 'destroy'])->name('staffs.delete');

         //invoice
        Route::get('/manages/invoices', [ AdInvoiceController::class, 'index'])->name('invoices.index');
        Route::get('/manages/invoices/detail/{id?}', [ AdInvoiceController::class, 'show'])->name('invoices.detail');

        Route::get('/checkout/packlist', [ AdInvoiceController::class, 'packList'])->name('checkout.packlist');
        Route::get('/checkout/packlist/detail/{id?}', [ AdInvoiceController::class, 'showPack'])->name('pack.detail');
        Route::get('/checkout/packlist/check/{id?}', [ AdInvoiceController::class, 'checkPack'])->name('pack.check');
        Route::get('/checkout/packlist/cancel/{id?}', [ AdInvoiceController::class, 'cancel'])->name('pack.cancel');
        Route::get('/checkout/deliverylist', [ AdInvoiceController::class, 'deliveryList'])->name('checkout.deliverylist');
        Route::get('/checkout/deliverylist/detail/{id?}', [ AdInvoiceController::class, 'showDelivery'])->name('delivery.detail');
        Route::get('/checkout/deliverylist/check/{id?}', [ AdInvoiceController::class, 'checkDelivery'])->name('delivery.check');

    });
});

// Route::post('/shop/seacrh', [ProductController::class, 'search'])->name('Search');

Route::get('/shop/{page?}', [ProductController::class, 'index'])->name('Shop');

Route::get('/details/{id?}', [ProductController::class, 'show'])->name('Detail');

Route::get('/shopcarts', [CartController::class, 'listCarts'])->name('Shopping Cart');


Route::get('/contact', [Controller::class, 'contact'])->name('Contact');


Route::get('/shop/category/{id?}',
    [ProductController::class, 'getByCategory']
)->name('products-of-category');

Route::post('/add-to-cart',
    [CartController::class, 'addToCart']
)->name('add-to-cart');

Route::get('/delete-cart/{id?}',
    [CartController::class, 'deleteCart']
)->name('delete-cart');

Route::get('/add-favourite/{id?}',
    [FavouriteController::class, 'addFavourite']
)->name('add-favourite');

Route::get('/delete-favourite/{id?}',
    [FavouriteController::class, 'deleteFavourite']
)->name('delete-favourite');


