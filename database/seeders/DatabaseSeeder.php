<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
use App\Models\ProductHeads;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
/*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        // product::factory()->count(10)->create();

        ProductHeads::factory()->state(['key' => 'name', 'title' => '商品名称'])->create();
        ProductHeads::factory()->state(['key' => 'pcode', 'title' => '商品编码'])->create();
        ProductHeads::factory()->state(['key'=> 'company', 'title'=> '厂商'])->create();
        ProductHeads::factory()->state(['key'=> 'ccode', 'title'=> '品类代码'])->create();
        ProductHeads::factory()->state(['key'=> 'type', 'title'=> '规格型号'])->create();
        ProductHeads::factory()->state(['key'=> 'unit', 'title'=> '单位'])->create();

    }
}
