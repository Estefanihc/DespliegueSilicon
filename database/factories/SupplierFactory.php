<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(), // Nombre de la empresa
            'fiscal_address' => $this->faker->address(), // Dirección fiscal
            'email' => $this->faker->optional()->safeEmail(), // Correo electrónico opcional
            'phone' => $this->faker->optional()->phoneNumber(), // Teléfono opcional
            'credit_line' => $this->faker->optional()->randomFloat(2, 1000, 50000), // Línea de crédito opcional
        ];
    }
}