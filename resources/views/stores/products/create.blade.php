@extends('layouts.layout')

@section('title', 'Crear Producto')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <h1 class="mb-4 text-background">Crear Nuevo Producto</h1>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <div class="inner-card p-4">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="mb-0">Detalles del producto</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Completa el siguiente formulario para registrar un nuevo producto.</p>

                        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="productName" class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="productName" name="name" placeholder="Ingrese el nombre del producto" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Ingrese la descripción del producto" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="purchasePrice" class="form-label">Precio de Compra</label>
                                <input type="number" class="form-control" id="purchasePrice" name="purchase_price" placeholder="Ingrese el precio de compra" step="0.01" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="salePrice" class="form-label">Precio de Venta</label>
                                <input type="number" class="form-control" id="salePrice" name="sale_price" placeholder="Ingrese el precio de venta" step="0.01" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="stock" class="form-label">Stock Disponible</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad de stock" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="entryDate" class="form-label">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="entryDate" name="entry_date" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Imagen del Producto</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn btn-custom">Registrar Producto</button> <!-- Cambiado -->
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>
                        
                        <!-- Mensaje de confirmación -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilo personalizado para el botón de Registrar Producto */
        .btn-custom {
            background: linear-gradient(to right, #4CAF50, #8BC34A);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 10px 30px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #388E3C, #7CB342);
            cursor: pointer;
        }

        .btn-custom:active {
            background: #2C6B2F;
            transform: scale(0.98);
        }

        .button-container {
            text-align: center;
        }

        /* Otros estilos del formulario y la página */
        /* ... */
    </style>

    <script>
        // Vista previa de la imagen antes de subirla
        document.getElementById('image').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endsection