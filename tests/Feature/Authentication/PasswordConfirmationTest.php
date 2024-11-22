<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $response = $this->actingAs($user)->get('/user/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed(): void
    {
        // Crear un usuario con la contraseña 'password'
        $user = User::factory()->create(['password' => 'password']); // Asegúrate de utilizar bcrypt
        $this->actingAs($user); // Actuar como el usuario creado

        // Enviar la contraseña correcta
        $response = $this->post('/user/confirm-password', [
            'password' => 'password',
        ]);

        // Asegurarse de que redirige y no hay errores en la sesión
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
