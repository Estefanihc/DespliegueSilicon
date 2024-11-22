<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPurchaseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $redirectPath = '/login'; // Centraliza la ruta de redirección para usuarios no autenticados

    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de relaciones productos -> compras.
     */
    public function test_guest_access_to_productsPurchases()
    {
        $this->get('/productsPurchases')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de relaciones productos -> compras.
     */
    public function test_guest_access_to_create_productPurchase()
    {
        $this->get('/productsPurchases/create')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de una relación productos -> compras específico.
     */
    public function test_guest_access_to_show_productPurchase()
    {
        $this->get('/productsPurchases/1') // Probar con un ID de relación existente o ficticio (ID probado: 1)
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de relaciones productos -> compras.
     */
    public function test_guest_access_to_edit_productPurchase()
    {
        $this->get('/productsPurchases/1/edit')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear una relación productos -> compras.
     */
    public function test_guest_access_to_store_productPurchase()
    {
        $this->post('/productsPurchases', [])
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar una relación productos -> compras.
     */
    public function test_guest_access_to_update_productPurchase()
    {
        $this->put('/productsPurchases/1', [])
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar una relación productos -> compras.
     */
    public function test_guest_access_to_destroy_productPurchase()
    {
        $this->delete('/productsPurchases/1')
            ->assertStatus(302)
            ->assertRedirect($this->redirectPath);
    }
}
