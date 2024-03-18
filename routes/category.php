<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix("/category")->middleware('auth')->group(function () {
    Route::get("", [CategoryController::class, "index"])->name("category");
    Route::post("modtify", [CategoryController::class, "edit"])->name("modtify");
    Route::get("create", [CategoryController::class, "create"])->name("create");
    Route::post("create", [CategoryController::class, "store"])->name("category.create");
});
