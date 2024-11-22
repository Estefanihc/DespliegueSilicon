<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de proveedores.
     */
    public function test_guest_access_to_suppliers()
    {
        $this->get('/suppliers')
            ->assertStatus(302) // Código 302 indica redirección
            ->assertRedirect('/login'); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de proveedores.
     */
    public function test_guest_access_to_create_supplier()
    {
        $this->get('/suppliers/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de un proveedor específico.
     */
    public function test_guest_access_to_show_supplier()
    {
        $this->get('/suppliers/1') // Probar con un ID de proveedor existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de proveedores.
     */
    public function test_guest_access_to_edit_supplier()
    {
        $this->get('/suppliers/1/edit') // Probar con un ID de proveedor existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear un proveedor.
     */
    public function test_guest_access_to_store_supplier()
    {
        $this->post('/suppliers', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar un proveedor.
     */
    public function test_guest_access_to_update_supplier()
    {
        $this->put('/suppliers/1', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar un proveedor.
     */
    public function test_guest_access_to_destroy_supplier()
    {
        $this->delete('/suppliers/1')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
