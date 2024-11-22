@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center" style="max-width: 600px;">
        <div class="logo-container mb-4">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
        </div>

        <h1 class="mb-4 text-background">Crear Nueva Compra</h1>

        <div class="outer-card shadow-lg mx-auto mb-4">
            <div class="inner-card p-4">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="mb-0">Detalles de la Compra</h2>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">Completa el siguiente formulario para registrar una nueva compra.</p>

                    <!-- Formulario de Compra -->
                    <form action="{{ route('purchases.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="product_id">Producto:</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ciaf_number">Número CIAF:</label>
                            <input type="text" name="ciaf_number" class="form-control" id="ciaf_number" value="{{ old('ciaf_number') }}">
                        </div>
                        <div class="form-group">
                            <label for="purchase_date_time">Fecha de Compra:</label>
                            <input type="datetime-local" name="purchase_date_time" class="form-control" id="purchase_date_time" value="{{ old('purchase_date_time') }}">
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Empleado:</label>
                            <select name="employee_id" class="form-control" id="employee_id">
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>                       
                        <div class="form-group">
                            <label for="supplier_id">Proveedor:</label>
                            <select name="supplier_id" class="form-control" id="supplier_id">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                @endforeach
                            </select>
                        </div>                       
                        <div class="form-group">
                            <label for="quantity">Cantidad:</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" min="1" value="{{ old('quantity') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <input type="number" name="price" class="form-control" id="price" step="0.01" min="0" value="{{ old('price') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Compra</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
                    </form>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .background-image {
        background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 0;
        color: #fff;
    }

    .logo {
        max-width: 180px;
        height: auto;
        margin-left: 37%;
    }

    .text-background {
        background-color: rgba(255, 140, 20, 0.85);
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        display: inline-block;
        margin-left: 18%;
    }

    .outer-card {
        border-radius: 20px;
        background-color: rgba(16, 13, 59, 0.95);
        transition: transform 0.3s ease;
        padding: 40px;
    }

    .outer-card:hover {
        transform: scale(1.05);
    }

    .inner-card {
        border-radius: 15px;
        border: none;
    }

    .card-header {
        border-radius: 15px 15px 0 0;
    }

    .btn {
        border-radius: 50px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        padding: 8px 20px;
        margin-bottom: 10%;
        font-size: 16px;
        font-weight: 600;
        width: 48%;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-primary:hover {
        background-color: #fd812f;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.5);
    }

    .btn-secondary {
        background-color: #6c757d;
        padding-top: 2%;
        padding-bottom: 2%;
        text-align: center;
        color: #fff;
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        box-shadow: 0 6px 12px rgba(108, 117, 125, 0.5);
    }

    .form-control {
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: box-shadow 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        border-color: #007bff;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .lead {
        font-size: 1.2rem;
        font-weight: 400;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: bold;
    }
</style>

<!-- Script para mostrar mensaje de confirmación -->
<script>
    document.getElementById('purchaseForm').addEventListener('submit', function (event) {
        event.preventDefault();
        
        // Obtén los valores de los campos
        const ciafNumber = document.getElementById('ciaf_number').value;
        const purchaseDateTime = document.getElementById('purchase_date_time').value;
        const employeeId = document.getElementById('employee_id').value;
        const supplierId = document.getElementById('supplier_id').value;
        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('price').value;

        // Envía los datos usando fetch (AJAX)
        fetch("{{ route('purchases.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            },
            body: JSON.stringify({
                ciaf_number: ciafNumber,
                purchase_date_time: purchaseDateTime,
                employee_id: employeeId,
                supplier_id: supplierId,
                quantity: quantity,
                price: price
            })
        })
        .then(response => response.json())
        .then(data => {
            // Mostrar mensaje de confirmación
            document.getElementById('confirmationMessage').classList.remove('d-none');
            // Limpia el formulario
            this.reset();
        })
        .catch(error => {
            console.error('Error al registrar la compra:', error);
        });
    });
</script>
@endsection
