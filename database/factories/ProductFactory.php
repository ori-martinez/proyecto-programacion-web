<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'img' => 'url',
            'price' => $this->faker->numberBetween(1, 10000),
            'category_id' => $this->faker->randomElement(Category::all()->pluck('id')->toArray()),
            'sport_id' => $this->faker->randomElement(Sport::all()->pluck('id')->toArray()),
        ];
    }
}
