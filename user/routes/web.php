<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect(route('dashboard'));
    });

    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(AuthenticationController::class)->group(function(){
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(BookController::class)->group(function(){
        Route::get('/books', 'index')->name('book.index');
        Route::get('/books/create', 'create')->name('book.create');
        Route::get('/books/{book}', 'edit')->name('book.edit');
        Route::post('/books/create', 'store')->name('book.store');
        Route::put('/books/{book}', 'update')->name('book.update');
        Route::delete('/books/{book}', 'delete')->name('book.delete');
    });

    Route::controller(ProductController::class, 'index')->group(function(){
        Route::get('/products', 'index')->name('product.index');
        Route::get('/products/create', 'create')->name('product.create');
        Route::get('/products/{product}', 'edit')->name('product.edit');
        Route::post('/products/create', 'store')->name('product.store');
        Route::put('/products/{product}', 'update')->name('product.update');
        Route::delete('/products/{product}', 'delete')->name('product.delete');

    Route::controller(UserController::class)->group(function(){
        Route::get('/profile', 'index')->name('user.profile');
        Route::post('/profile', 'updateProfile')->name('user.update-profile');
        Route::get('/profile/change-password', 'editPassword')->name('user.edit-password');
        Route::post('/profile/change-password', 'updatePassword')->name('user.update-password');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthenticationController::class)->group(function(){
        Route::get('/login','index')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
    });
});

