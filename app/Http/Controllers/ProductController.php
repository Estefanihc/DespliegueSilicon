<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importar el modelo Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Método para mostrar la página principal de los productos
    public function index() 
    {
        $products = Product::paginate(6);
        return view('stores.products.index', compact('products')); // Pasar la lista de productos a la vista
    }

    // Método para mostrar la información de un producto en específico
    public function show(Product $product) 
    {
        return view('stores.products.show', compact('product')); // Pasar el producto a la vista
    }

    // Método para mostrar el formulario para crear un nuevo producto
    public function create()
    {
        return view('stores.products.create');
    }

    // Método para mostrar el formulario de edición
    public function edit(Product $product) {
        return view('stores.products.edit', compact('product'));
    }

    // Método para almacenar un nuevo producto
    public function store(Request $request)
    {
        // Verifica si los datos están llegando correctamente
        // dd($request->all());

        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'entry_date' => 'nullable|date',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric|gt:purchase_price', // Asegúrate de que el precio de venta sea mayor que el precio de compra
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Calcular el margen de ganancia
        $purchasePrice = $validatedData['purchase_price'];
        $salePrice = $validatedData['sale_price'];
        $profitMargin = ($purchasePrice > 0) ? (($salePrice - $purchasePrice) / $purchasePrice) * 100 : 0;
        $validatedData['profit_margin'] = $profitMargin;

        // Crear un nuevo producto
        $product = new Product();
        $this->fillProduct($product, $validatedData);

        // Manejar la imagen
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        // Redirigir a la lista de productos o a una vista de confirmación
        return redirect()->route('products.show', $product)->with('success', 'Producto creado exitosamente.');
    }

    // Método para actualizar un producto existente
    public function update(Request $request, Product $product)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'entry_date' => 'nullable|date',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric|gt:purchase_price', // Asegúrate de que el precio de venta sea mayor que el precio de compra
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            'profit_margin' => 'nullable|numeric', // Se agrega la validación para profit_margin
        ]);
    
        // Actualizar el producto existente
        $this->fillProduct($product, $validatedData);
    
        // Manejar la imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($product->image) {
                Storage::delete($product->image);
            }
    
            $product->image = $request->file('image')->store('images', 'public');
        }
    
        $product->save(); // Guardar los cambios
    
        // Redirigir a la lista de productos o a una vista de confirmación
        return redirect()->route('products.show', $product)->with('success', 'Producto actualizado exitosamente.');
    }
    
    // Método para llenar las propiedades del producto
    protected function fillProduct(Product $product, array $data)
    {
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->entry_date = $data['entry_date'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price = $data['sale_price'];
        $product->stock = $data['stock'];
    
        // Solo asignar profit_margin si está presente en los datos validados
        if (isset($data['profit_margin'])) {
            $product->profit_margin = $data['profit_margin'];
        }
    }

    public function destroy($id)
{
    $product = Product::find($id);
    if ($product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    } else {
        return redirect()->route('products.index')->with('error', 'Producto no encontrado');
    }
}

    
}
