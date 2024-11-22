<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios de prueba
        User::create([
            'name' => 'Sebasthian',
            'email' => 's@gmail.com',
            'password' => '123456', // Se hasheará automáticamente
        ]);

        User::create([
            'name' => 'Estefani',
            'email' => 'e@gmail.com',
            'password' => '123456', // Se hasheará automáticamente
        ]);

        User::create([
            'name' => 'Aaron',
            'email' => 'a@gmail.com',
            'password' => '123456', // Se hasheará automáticamente
        ]);

        /*
        User::create([
            'name' => 'Giancarlo',
            'email' => 'g@gmail.com',
            'password' => '123456', // Se hasheará automáticamente
        ]);
        */
    }
}
