<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {     

        return [
            'name' =>fake()->name(),
            'image' =>fake()->imageUrl(),
            'pcode'=>fake()->unique()->countryCode(),
            'type' =>fake()->city(),
            'unit'=>'个',
            'brand'=>fake()->company(),
            'ccode'=>fake()->postcode(),
            //
        ];
    }
}
