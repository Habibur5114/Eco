<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\AdminController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\SubcategorieController;
use App\Http\Controllers\BackEnd\ChildcategoriesController;
use App\Http\Controllers\BackEnd\ProductController;
use App\Http\Controllers\BackEnd\GeneralController;
use App\Http\Controllers\BackEnd\ContactController;
use App\Http\Controllers\BackEnd\ShippingController;
use App\Http\Controllers\FontEnd\Fontendcontroller;
use App\Http\Controllers\FontEnd\CartController;
use App\Http\Middleware\admin;



// Admin
Route::middleware([admin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
Route::get('/admin/register', [AdminController::class, 'create'])->name('admin.register');
Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::post('/admin/save', [AdminController::class, 'store'])->name('admin.save');
Route::get('/admin/status/{id}', [AdminController::class, 'status'])->name('admin.status');

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::Post('/category/save', [CategoryController::class, 'store'])->name('category.save');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');

// subcategory

Route::get('/subcategory', [SubcategorieController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/create', [SubcategorieController::class, 'create'])->name('subcategory.create');
Route::Post('/subcategory/save', [SubcategorieController::class, 'store'])->name('subcategory.save');
Route::get('/subcategory/show/{id}', [SubcategorieController::class, 'show'])->name('subcategory.show');
Route::post('/subcategory/update', [SubcategorieController::class, 'update'])->name('subcategory.update');
Route::get('/subcategory/status/{id}', [SubcategorieController::class, 'status'])->name('subcategory.status');



// childcategories
Route::get('/childcategory', [ChildcategoriesController::class, 'index'])->name('childcategory.index');
Route::get('/childcategory/create', [ChildCategoriesController::class, 'create'])->name('childcategory.create');
Route::Post('/childcategory/save', [ChildCategoriesController::class, 'store'])->name('childcategory.save');
Route::get('/childcategory/show/{id}', [ChildCategoriesController::class, 'show'])->name('childcategory.show');
Route::post('/childcategory/update', [ChildCategoriesController::class, 'update'])->name('childcategory.update');
Route::get('/childcategory/status/{id}', [ChildCategoriesController::class, 'status'])->name('childcategory.status');


//product

Route::get('/product',     [ProductController::class, 'index'])->name('product.index');
Route::get('/create',      [ProductController::class, 'create'])->name('product.create');
Route::post('/product/save',[ProductController::class, 'store'])->name('product.save');
Route::get('/product/show/{id}',[ProductController::class, 'show'])->name('product.show');
Route::post('/product/update/',[ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/status/{id}',[ProductController::class, 'status'])->name('product.status');
Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('get.subcategories');
Route::get('/get-childcategories', [ProductController::class, 'getChildCategories'])->name('get.childcategories');




// frontEnd

Route::get('/',[Fontendcontroller::class, 'index'])->name('Fontend.index');
Route::get('/category-wise/{slug}',[Fontendcontroller::class, 'categorywise'])->name('Fontend.categorywise');
Route::get('/product/{id}', [Fontendcontroller::class, 'getProductDetails'])->name('product.details');

//card

Route::get('/carts',[CartController::class, 'index'])->name('carts');
Route::post('/carts/save',[CartController::class, 'store'])->name('carts.store');
Route::get('/carts/delete/{id}',[CartController::class, 'delete'])->name('carts.delete');
Route::patch('/carts/update/{id}', [CartController::class, 'update'])->name('carts.update');

//setting
Route::get('/admin/general',[GeneralController ::class, 'index'])->name('general.index');
Route::post('/admin/general/update',[GeneralController ::class, 'update'])->name('general.update');
Route::get('/admin/general/show/{id}',[GeneralController ::class, 'show'])->name('general.show');
Route::get('/admin/general/status/{id}',[GeneralController ::class, 'status'])->name('general.status');


//contact

Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/admin/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::Post('/admin/contact/save', [ContactController::class, 'store'])->name('contact.save');
Route::get('/admin/contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::post('/admin/contact/update', [ContactController::class, 'update'])->name('contact.update');
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
Route::get('/admin/contact/status/{id}', [ContactController::class, 'status'])->name('contact.status');




// shipping
Route::get('/admin/shipping', [ShippingController::class, 'index'])->name('shipping.index');
Route::get('/admin/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
Route::post('/admin/shipping/save', [ShippingController::class, 'store'])->name('shipping.store');
Route::get('/admin/shipping/edit/{id}', [ShippingController::class, 'edit'])->name('shipping.edit');
Route::post('/admin/shipping/update', [ShippingController::class, 'update'])->name('shipping.update');
Route::get('/admin/shipping/destroy/{id}', [ShippingController::class, 'destroy'])->name('shipping.destroy');
Route::get('/admin/shipping/status/{id}', [ShippingController::class, 'status'])->name('shipping.status');


Route::get('/change-lang/{lang}', [Fontendcontroller::class, 'changeLang'])->name('change-lang');
