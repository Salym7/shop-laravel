<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TagController;
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

Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix'  => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
});
Route::group(['prefix'  => 'tags'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/', [TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::get('/{tag}', [TagController::class, 'show'])->name('tag.show');
    Route::patch('/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [TagController::class, 'delete'])->name('tag.delete');
});

Route::group(['prefix'  => 'colors'], function () {
    Route::get('/', [ColorController::class, 'index'])->name('color.index');
    Route::get('/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('/', [ColorController::class, 'store'])->name('color.store');
    Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
    Route::get('/{color}', [ColorController::class, 'show'])->name('color.show');
    Route::patch('/{color}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/{color}', [ColorController::class, 'delete'])->name('color.delete');
});
