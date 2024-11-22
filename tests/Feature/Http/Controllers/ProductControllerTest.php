<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de productos.
     */
    public function test_guest_access_to_products()
    {
        $this->get('/products')
            ->assertStatus(302) // Código 302 indica redirección
            ->assertRedirect('/login'); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de productos.
     */
    public function test_guest_access_to_create_product()
    {
        $this->get('/products/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de un producto específico.
     */
    public function test_guest_access_to_show_product()
    {
        $this->get('/products/1') // Probar con un ID de producto existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de productos.
     */
    public function test_guest_access_to_edit_product()
    {
        $this->get('/products/1/edit') // Probar con un ID de producto existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear un producto.
     */
    public function test_guest_access_to_store_product()
    {
        $this->post('/products', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar un producto.
     */
    public function test_guest_access_to_update_product()
    {
        $this->put('/products/1', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar un producto.
     */
    public function test_guest_access_to_destroy_product()
    {
        $this->delete('/products/1')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    // Prueba que un usuario pueda crear un producto con datos válidos
    public function testUserCanCreateProductWithValidData()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'entry_date' => '2024-10-12',
            'purchase_price' => 10.0,
            'sale_price' => 20.0,
            'stock' => 5,
            'profit_margin' => 10.0,
            'image' => null, // O puedes simular una imagen si es necesario
        ]);

        $response->assertStatus(302); // Verifica que redirige después de crear el producto
        $this->assertDatabaseHas('products', [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => 10.0,
            'sale_price' => 20.0,
            'stock' => 5,
            'profit_margin' => 100.0,
        ]);
    }

    // Prueba que un usuario no pueda crear un producto sin un nombre
    public function testUserCannotCreateProductWithoutName()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => '', // Sin nombre
            'description' => 'Descripción del producto',
            'purchase_price' => 10.0,
            'sale_price' => 20.0,
            'stock' => 5,
            'profit_margin' => 10.0,
            'image' => null,
        ]);

        $response->assertSessionHasErrors('name'); // Verifica que hay un error de validación para 'name'
    }

    // Prueba que un usuario no pueda crear un producto sin un precio de compra
    public function testUserCannotCreateProductWithoutPurchasePrice()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => '', // Sin precio de compra
            'sale_price' => 20.0,
            'stock' => 5,
            'profit_margin' => 10.0,
            'image' => null,
        ]);

        $response->assertSessionHasErrors('purchase_price'); // Verifica que hay un error de validación para 'purchase_price'
    }

    // Prueba que un usuario no pueda crear un producto sin un precio de venta
    public function testUserCannotCreateProductWithoutSalePrice()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => 10.0,
            'sale_price' => '', // Sin precio de venta
            'stock' => 5,
            'profit_margin' => 10.0,
            'image' => null,
        ]);

        $response->assertSessionHasErrors('sale_price'); // Verifica que hay un error de validación para 'sale_price'
    }

    // Prueba que un usuario no pueda crear un producto con un precio de venta menor que el precio de compra
    public function testUserCannotCreateProductWithSalePriceLessThanPurchasePrice()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => 20.0, // Precio de compra
            'sale_price' => 10.0, // Precio de venta menor que el precio de compra
            'stock' => 5,
            'profit_margin' => 10.0,
            'image' => null,
        ]);

        $response->assertSessionHasErrors('sale_price'); // Verifica que hay un error de validación para 'sale_price'
    }

    // Prueba que un usuario no pueda crear un producto sin stock
    public function testUserCannotCreateProductWithoutStock()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => 10.0,
            'sale_price' => 20.0,
            'stock' => '', // Sin stock
            'profit_margin' => 10.0,
            'image' => null,
        ]);

        $response->assertSessionHasErrors('stock'); // Verifica que hay un error de validación para 'stock'
    }

    // Prueba que un usuario no pueda crear un producto sin margen de ganancia
    public function testUserCannotCreateProductWithoutProfitMargin()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('products.store'), [
            'name' => 'Nombre del producto',
            'description' => 'Descripción del producto',
            'purchase_price' => 10.0,
            'sale_price' => 20.0,
            'stock' => 5,
            'profit_margin' => '', // Sin margen de ganancia
            'image' => null,
        ]);

        $response->assertSessionHasErrors('profit_margin'); // Verifica que hay un error de validación para 'profit_margin'
    }
}
