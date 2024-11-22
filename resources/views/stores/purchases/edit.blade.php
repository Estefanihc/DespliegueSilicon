@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Compra</h1>

        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo para ingresar el número de CIAF -->
            <div class="mb-3">
                <label for="ciaf_number" class="form-label">Número de CIAF</label>
                <input type="text" name="ciaf_number" id="ciaf_number" class="form-control" value="{{ old('ciaf_number', $purchase->ciaf_number) }}" required>
            </div>

            <!-- Campo para la cantidad -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $purchase->quantity) }}" required>
            </div>

            <!-- Campo para el precio -->
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $purchase->price) }}" required>
            </div>

            <!-- Campo para la fecha y hora de la compra -->
            <div class="mb-3">
                <label for="purchase_date_time" class="form-label">Fecha de Compra</label>
                <input type="datetime-local" name="purchase_date_time" id="purchase_date_time" class="form-control" value="{{ old('purchase_date_time', $purchase->purchase_date_time->format('Y-m-d\TH:i')) }}" required>
            </div>

            <!-- Campo para seleccionar empleado -->
            <div class="mb-3">
                <label for="employee_id" class="form-label">Empleado</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $purchase->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para seleccionar proveedor -->
            <div class="mb-3">
                <label for="supplier_id" class="form-label"><strong>Proveedor</strong></label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <!-- Campo para seleccionar producto -->
            <div class="mb-3">
                <label for="product_id" class="form-label">Producto</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $purchase->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Compra</button>
        </form>
    </div>
@endsection
