<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar una combinación única
        do {
            // Obtener un ID aleatorio de una compra y un producto
            $purchase_id = Purchase::pluck('id')->random();
            $product_id = Product::pluck('id')->random();
            
            // Generar una cantidad aleatoria de productos comprados
            $quantity_purchased = $this->faker->numberBetween(1, 100);

            // Comprobar si la combinación ya existe en la tabla product_purchases
            $exists = DB::table('product_purchases')
                ->where('purchase_id', $purchase_id)
                ->where('product_id', $product_id)
                ->exists();
        } while ($exists); // Repetir hasta que no se repita la combinación

        // Retornar los valores para insertar en product_purchases
        return [
            'purchase_id' => $purchase_id,
            'product_id' => $product_id,
            'quantity_purchased' => $quantity_purchased,
        ];
    }
}
