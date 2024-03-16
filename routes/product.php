<?php
use App\Http\Controllers\ProductController;
use App\Models\product;
use Illuminate\Support\Facades\Route;

Route::prefix("product")->group(function () {
    Route::get("/", [ProductController::class,"index"]);
    Route::get('/code/{product}',[ProductController::class,'get']);
    Route::get('/category/{category}',[ProductController::class,'getByCategory'])->name('product.categories');
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/create',[ProductController::class,'store'])->name('product.create');
    Route::get("/info",function(){
        return "ok";
    });
})->middleware("auth");