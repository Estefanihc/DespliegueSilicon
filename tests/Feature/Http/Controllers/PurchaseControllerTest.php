<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $redirectPath = '/login'; // Centraliza la ruta de redirección para usuarios no autenticados

    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de compras.
     */
    public function test_guest_access_to_purchases()
    {
        $this->get('/purchases')
            ->assertStatus(302) // Código 302 indica redirección
            ->assertRedirect($this->redirectPath); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de compras.
     */
    public function test_guest_access_to_create_purchase()
    {
        $this->get('/purchases/create')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de una compra específica.
     */
    public function test_guest_access_to_show_purchase()
    {
        $this->get('/purchases/1') // Probar con un ID de compra existente o ficticio (ID probado: 1)
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de compras.
     */
    public function test_guest_access_to_edit_purchase()
    {
        $this->get('/purchases/1/edit')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear una compra.
     */
    public function test_guest_access_to_store_purchase()
    {
        $this->post('/purchases', [])
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar una compra.
     */
    public function test_guest_access_to_update_purchase()
    {
        $this->put('/purchases/1', [])
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar una compra.
     */
    public function test_guest_access_to_destroy_purchase()
    {
        $this->delete('/purchases/1')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }
}
