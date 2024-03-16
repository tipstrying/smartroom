<?php

use App\Models\Category;
use App\Models\product;
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
    $this->comment (product::all());
})->purpose('')->hourly();

Artisan::command('category', function () {
    $this->comment (Category::all());
})->hourly();
Artisan::command('mydbraw', function (string $query) {
    DB::raw($query);
})->hourly();