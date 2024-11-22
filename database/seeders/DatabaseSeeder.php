<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        //CON SEEDERS
        // Ejecuta el UserSeeder
        $this->call(UserSeeder::class);
        
        // Ejecuta el EmployeeSeeder
        $this->call(EmployeeSeeder::class);


        //CON FACTORIES
        // Ejecuta el ProductSeeder
        $this->call(ProductSeeder::class);

        // Ejecuta el SupplierSeeder
        $this->call(SupplierSeeder::class);

        // Ejecuta el PurchaseSeeder
        $this->call(PurchaseSeeder::class);

        // Ejecuta el ProductPurchaseSeeder
        $this->call(ProductPurchaseSeeder::class);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
