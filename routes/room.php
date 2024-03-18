<?php
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;

Route::prefix("/room")->middleware('auth')->group(function () {
    Route::get("/",[RoomsController::class,"index"]);
    Route::get("/create",[RoomsController::class,"create"]);
    Route::post("/create",[RoomsController::class,"store"])->name("room.create");
});