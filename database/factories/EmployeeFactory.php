<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User; // Asegúrate de que esté presente para obtener un user_id
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'hire_date' => $this->faker->date,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'user_id' => User::factory(), // Esto creará un usuario automáticamente y usará su ID
        ];
    }
}
