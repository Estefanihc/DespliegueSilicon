@extends('layouts.layout')

@section('title', 'Editar Compra ' . $purchase->id)

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center" style="max-width: 600px;">
        <h1 class="mb-4 text-background">Editar Compra</h1>

        <div class="outer-card shadow-lg mx-auto mb-4">
            <div class="inner-card p-4">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="mb-0">Compra: {{ $purchase->item_name }}</h2>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">Aquí puedes editar la información de la compra.</p>

                    <!-- Formulario para editar la compra -->
                    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="details-container">
                            <div class="mb-3">
                                <label for="item_name" class="form-label"><strong>Producto</strong></label>
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" 
                                            @if($product->id == $purchase->product_id) selected @endif>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>                            

                            <div class="mb-3">
                                <label for="ciaf_number" class="form-label"><strong>Número de CIAF</strong></label>
                                <input type="text" name="ciaf_number" id="ciaf_number" class="form-control" value="{{ old('ciaf_number', $purchase->ciaf_number) }}" placeholder="N/A">
                            </div>

                            <div class="mb-3">
                                <label for="purchase_date_time" class="form-label"><strong>Fecha y Hora de Compra</strong></label>
                                <input type="datetime-local" name="purchase_date_time" id="purchase_date_time" class="form-control" value="{{ old('purchase_date_time', $purchase->purchase_date_time) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="employee_id" class="form-label"><strong>Empleado que Realizó la Compra</strong></label>
                                <select name="employee_id" class="form-control" id="employee_id" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ $employee->id == $purchase->employee_id ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="mb-3">
                                <label for="supplier_id" class="form-label"><strong>Proveedor</strong></label>
                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>
                                            {{ $supplier->company_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                                                                           

                            <!-- Campo para editar Cantidad -->
                            <div class="mb-3">
                                <label for="quantity" class="form-label"><strong>Cantidad</strong></label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $purchase->quantity) }}" required>
                            </div>

                            <!-- Campo para editar Precio -->
                            <div class="mb-3">
                                <label for="price" class="form-label"><strong>Precio</strong></label>
                                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $purchase->price) }}" required>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="button-container mt-4" style="display: flex; gap: 20px;">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS adicionales -->
<style>
    /* Tus estilos CSS */
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-secondary {
        background-color: #6c757d;
        padding-top: 2%;
        padding-bottom: 2%;
        text-align: center;
        color: #fff;
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }
</style>
@endsection
