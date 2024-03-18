<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Rooms;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('users', function () {
    $this->comment (User::all());

})->purpose('')->hourly();

Artisan::command('products', function () {
    $this->comment (Product::all());
})->purpose('')->hourly();

Artisan::command('category', function () {
    $this->comment (Category::all());
})->hourly();
Artisan::command('rooms', function () {
    $this->comment(Rooms::all());
})->hourly();
Artisan::command('mydbraw', function (string $query) {
    DB::raw($query);
})->hourly();