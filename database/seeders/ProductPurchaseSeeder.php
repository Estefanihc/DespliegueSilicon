<?php

namespace Database\Seeders;

use App\Models\ProductPurchase;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numRecords = 20; // Cantidad de registros que se desea crear

        // Obtener todos los IDs únicos de productos y compras
        $purchases = Purchase::all();
        $products = Product::all();

        // Comprobar si hay suficientes productos y compras
        if ($purchases->isEmpty() || $products->isEmpty()) {
            throw new \Exception("No hay suficientes registros en las tablas purchases o products.");
        }

        $uniqueCombinations = [];

        // Generar combinaciones únicas
        while (count($uniqueCombinations) < $numRecords) {
            $purchase_id = $purchases->random()->id;
            $product_id = $products->random()->id;

            // Asegúrate de que la combinación sea única
            if (!in_array("$purchase_id-$product_id", $uniqueCombinations)) {
                $uniqueCombinations[] = "$purchase_id-$product_id";

                ProductPurchase::create([
                    'purchase_id' => $purchase_id,
                    'product_id' => $product_id,
                    'quantity_purchased' => rand(1, 100), // O usa $this->faker
                ]);
            }
        }
    }
}
