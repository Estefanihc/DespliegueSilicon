<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'entry_date' => $this->faker->date(),
            'purchase_price' => $this->faker->randomFloat(2, 10, 100), // Precio de compra entre 10 y 100
            'sale_price' => $this->faker->randomFloat(2, 20, 200),     // Precio de venta entre 20 y 200
            'profit_margin' => $this->faker->randomFloat(2, 5, 50),    // Margen de ganancia entre 5% y 50%
            'stock' => $this->faker->numberBetween(1, 500),            // Stock entre 1 y 500
        ];
    }
}   