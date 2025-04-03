<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discounts>
 */
class DiscountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'discount_value' => fake()->numberBetween(1, 100),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
        ];
    }
}
