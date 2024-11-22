<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Employee; // Asegúrate de que el modelo Employee esté incluido
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class PurchaseController extends Controller
{
    // Método para mostrar la página principal de las compras
    public function index()
    {
        $purchases = Purchase::paginate(15);
        return view('stores.purchases.index', compact('purchases'));
    }

    // Método para mostrar detalles de una compra específica
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        $suppliers = Supplier::all(); // Si necesitas la lista de proveedores
        $employees = Employee::all(); 
        $products = Product::all();
        return view('stores.purchases.show', compact('products','purchase','suppliers','employees')); 
    }

    // Mostrar el formulario de crear nueva compra con listas de empleados y proveedores
    public function create()
    {
        // Obtener empleados y proveedores de la base de datos
        $employees = Employee::all(); 
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('stores.purchases.create', compact( 'employees', 'suppliers', 'products'));
        
    }

    // Almacenar la nueva compra
    public function store(Request $request)
{
    // Validar los datos recibidos
    $request->validate([
        'ciaf_number' => 'nullable|string|max:255',
        'purchase_date_time' => 'required|date',
        'employee_id' => 'required|integer',
        'supplier_id' => 'required|integer',
        'price' => 'required|numeric|min:0',
        'product_id' => 'required|integer', // Validar el ID del producto
        'quantity' => 'required|integer|min:1', // Validar la cantidad
    ]);

    try {
        // Crear la compra y asignar el campo quantity
        $purchase = Purchase::create($request->only([
            'ciaf_number',
            'purchase_date_time',
            'employee_id',
            'supplier_id',
            'price',
            'product_id', // Añadir el product_id aquí si no lo estás guardando directamente en un detalle de compra
        ]));

        // Ahora vinculamos el producto con la compra y asignamos la cantidad
        $purchase->products()->attach($request->product_id, [
            'quantity_purchased' => $request->quantity,
        ]);
        
        return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Error al registrar la compra: ' . $e->getMessage()]);
    }
}


    // Método para realizar la búsqueda de productos y proveedores
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json(['error' => 'No query provided'], 400);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $suppliers = Supplier::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json(['products' => $products, 'suppliers' => $suppliers]);
    }

    // Método para actualizar los detalles de una compra
    public function update(Request $request, $id)
    {
        $request->validate([
            'ciaf_number' => 'nullable|string|max:255',
            'purchase_date_time' => 'required|date',
            'employee_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
        ]);

        $purchase = Purchase::findOrFail($id);

        // Asigna los valores enviados desde el formulario
        $purchase->ciaf_number = $request->input('ciaf_number');
        $purchase->purchase_date_time = $request->input('purchase_date_time');
        $purchase->employee_id = $request->input('employee_id');
        $purchase->supplier_id = $request->input('supplier_id');
        $purchase->quantity = $request->input('quantity');
        $purchase->price = $request->input('price');
        
        // Guarda los cambios en la base de datos
        $purchase->save();

        return redirect()->route('purchases.index')->with('success', 'La compra con ID ' . $id . ' se ha editado correctamente.');
    }


    public function destroy($id)
    {
        try {
            // Busca la compra por ID
            $purchase = Purchase::findOrFail($id);

            // Elimina la compra
            $purchase->delete();

            // Redirige con un mensaje de éxito
            return redirect()->route('purchases.index')->with('success', 'Compra eliminada exitosamente.');
        } catch (\Exception $e) {
            // Maneja posibles errores y redirige con un mensaje de error
            return redirect()->route('purchases.index')->withErrors(['error' => 'Error al eliminar la compra: ' . $e->getMessage()]);
        }
    }


}
