<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginEmailValidationTest extends TestCase
{
    use RefreshDatabase; // Asegura que cada test inicie con una base de datos limpia

    /** @test */
    public function login_falla_con_email_invalido()
    {
        // Intentar iniciar sesión con un email inválido
        $response = $this->post('/login', [
            'email' => 'correo-invalido',  // Email en formato incorrecto
            'password' => 'password123',
        ]);

        // Verificar que haya errores en el campo 'email'
        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function login_exitoso_con_email_valido()
    {
        // Crear un usuario de prueba con un email válido y una contraseña hasheada
        $user = User::factory()->create([
            'email' => 'correo@valido.com',
            'password' => 'password123', // Hashear la contraseña manualmente
        ]);

        // Intentar iniciar sesión con el email y la contraseña correctos
        $response = $this->post('/login', [
            'email' => 'correo@valido.com',  // Email válido
            'password' => 'password123',     // Contraseña correcta
        ]);

        // Verificar que no haya errores en el campo 'email'
        $response->assertSessionDoesntHaveErrors(['email']);
    }

}
