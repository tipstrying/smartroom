<?php
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix("product")->middleware('auth')->group(function () {
    Route::get("/", [ProductController::class,"index"])->name('product');
    Route::get('/edit/{product}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('/delete/{product}',[ProductController::class,'destroy'])->name('product.delete');

    Route::get('/category/{category}',[ProductController::class,'getByCategory'])->name('product.categories');
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/create',[ProductController::class,'store'])->name('product.create');
    Route::get("/info",function(){
        return "ok";
    });
});