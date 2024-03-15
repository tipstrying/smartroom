<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductHeads;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        product::factory()->count(10)->create();

        ProductHeads::factory()->state(['key' => 'name', 'title' => '商品名称'])->create();
        ProductHeads::factory()->state(['key' => 'pcode', 'title' => '商品编码'])->create();
        ProductHeads::factory()->state(['key' => 'brand', 'title' => '厂商'])->create();
        ProductHeads::factory()->state(['key' => 'ccode', 'title' => '品类代码'])->create();
        ProductHeads::factory()->state(['key' => 'type', 'title' => '规格型号'])->create();
        ProductHeads::factory()->state(['key' => 'unit', 'title' => '单位'])->create();
    }
}
