<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // Importar el modelo Supplier
use App\Http\Requests\StoreSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Método para mostrar la página principal de los proveedores
    public function index() 
    {
        $suppliers = Supplier::paginate(15);

        return view('stores.suppliers.index', compact('suppliers'));
    }

    /*// Método para mostrar la información de un proveedor específico
    public function show($id) 
    {
        // Busca el proveedor por ID, o lanza un 404 si no se encuentra
        $supplier = Supplier::findOrFail($id);
        
        return view('stores.suppliers.show', compact('supplier'));
    }*/

    // Método para mostrar el formulario para crear un nuevo proveedor
    public function create() 
    {
        return view('stores.suppliers.create');
    }

    // Método para almacenar un nuevo proveedor
    public function store(StoreSupplier $request) 
    {
        // Crear el proveedor
        Supplier::create($request->all());

        // Redirigir a la lista de proveedores con un mensaje
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado con éxito.');
    }

    // Método para mostrar el formulario para editar un nuevo proveedor
    public function edit(Supplier $supplier)
    {
        return view('stores.suppliers.edit', compact('supplier'));
    }

    // Método para actualizar un proveedor
    public function update(StoreSupplier $request, Supplier $supplier)
    {
        // Actualizar el proveedor con los nuevos datos
        $supplier->update($request->all());

        // Redirigir a la lista de proveedores con un mensaje
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado con éxito.');
    }

    // Método para eliminar un proveedor
    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
    
            return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('suppliers.index')->with('error', 'Hubo un problema al eliminar el proveedor.');
        }
    }
}
