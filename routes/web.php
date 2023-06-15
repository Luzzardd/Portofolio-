<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::middleware('auth')->group(function() {
//admin
Route::middleware('role:Admin')->group(function() {
Route::get('/slider', [SliderController::class, 'index'])->name('slider');
Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{id}', [SliderController::class, 'delete'])->name('slider.delete');
});
//staff dan admin
Route::middleware('role:Admin|Staff')->group(function() {
Route::get('/brand', [BrandController::class, 'index' ])->name('brand');
Route::post('/brand', [BrandController::class, 'store' ])->name('brand.store');
Route::get('/brand/create', [BrandController::class, 'create' ])->name('brand.create');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit' ])->name('brand.edit');
Route::put('/brand/{id}', [BrandController::class, 'update' ])->name('brand.update');
Route::delete('/brand/{id}', [BrandController::class, 'delete' ])->name('brand.delete');
});
//staff dan admin
Route::middleware('role:Admin|Staff')->group(function() {
Route::get('/category', [CategoryController::class, 'index' ])->name('category');
Route::post('/category', [CategoryController::class, 'store' ])->name('category.store');
Route::get('/category/create', [CategoryController::class, 'create' ])->name('category.create');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit' ])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update' ])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'delete' ])->name('category.delete');
});

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');


Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');


Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::delete('/role/{id}', [RoleController::class, 'delete'])->name('role.delete');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');


});






