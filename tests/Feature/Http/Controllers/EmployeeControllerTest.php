<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de empleados.
     */
    public function test_guest_access_to_employees()
    {
        $this->get('/employees')
            ->assertStatus(302) // Código 302 indica redirección
            ->assertRedirect('/login'); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de empleados.
     */
    public function test_guest_access_to_create_employee()
    {
        $this->get('/employees/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de un empleado específico.
     */
    public function test_guest_access_to_show_employee()
    {
        $this->get('/employees/1') // Probar con un ID de empleado existente o ficticio (ID probado: 1)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de empleados.
     */
    public function test_guest_access_to_edit_employee()
    {
        $this->get('/employees/1/edit') // Probar con un ID de empleado existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear un empleado.
     */
    public function test_guest_access_to_store_employee()
    {
        $this->post('/employees', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar un empleado.
     */
    public function test_guest_access_to_update_employee()
    {
        $this->put('/employees/1', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar un empleado.
     */
    public function test_guest_access_to_destroy_employee()
    {
        $this->delete('/employees/1')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
