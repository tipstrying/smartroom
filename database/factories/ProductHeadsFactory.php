<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductHeadsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "aligen" => 'center',
            "key" => 'name',
            "sortable" => false,
            "title" => 'title',
            //
        ];
    }
    public function NewHead(string $title, string $key, bool $sortable = false, string $align = 'center'):array
    {
        return [
            'title'=>$title,
            'key'=>$key,
            'sortable'=>$sortable,
            'aligen'=>$align
        ];
    }
}
