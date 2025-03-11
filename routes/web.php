<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2025 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */


use Illuminate\Support\Facades\Route;
use \Modules\V1\Products\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::post('products/{id}/toggle-top', [ProductController::class, 'toggleTop'])->name('products.toggle-top');
