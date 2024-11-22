@extends('layouts.layout')

@section('title', 'Producto ' . $product->name)

@section('content')
    <!-- Enlace a Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://images.pexels.com/photos/3184298/pexels-photo-3184298.jpeg');
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.85); /* Fondo oscuro con transparencia */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            margin: 20px;
            text-align: center;
            color: #f5f5f5;
        }

        .title {
            font-size: 36px;
            color: #4CAF50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .product-info p {
            font-size: 18px;
            margin: 10px 0;
            color: #cfcfcf;
        }

        .product-info span {
            color: #f39c12;
            font-weight: bold;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            outline: none;
            cursor: pointer;
            display: inline-block;
            margin: 15px 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #f39c12;
            color: white;
        }

        .btn-primary:hover {
            background-color: #e67e22;
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.4);
        }

        .btn-secondary {
            background-color: #4b516d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #3e4453;
            box-shadow: 0 6px 20px rgba(75, 81, 109, 0.4);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .product-image img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .product-image img:hover {
            transform: scale(1.05);
        }
    </style>

    <div class="container">
        <!-- Título -->
        <div class="title">Información del Producto: <span>{{ $product->name }}</span></div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Información del producto -->
        <div class="product-info">
            <p>Descripción: <span>{{ $product->description }}</span></p>
            <p>Fecha de Entrada: <span>{{ \Carbon\Carbon::parse($product->entry_date)->format('d/m/Y') }}</span></p>
            <p>Precio de Compra: <span>S/. {{ number_format($product->purchase_price, 2) }}</span></p>
            <p>Precio de Venta: <span>S/. {{ number_format($product->sale_price, 2) }}</span></p>
            <p>Stock Disponible: <span>{{ $product->stock }}</span></p>
            <p>Margen de Beneficio: <span>{{ $product->profit_margin }}%</span></p>
        </div>

        <!-- Imagen del producto -->
        @if($product->image)
            <div class="product-image">
                <img src="{{ Storage::url($product->image) }}" alt="Imagen de {{ $product->name }}">
            </div>
        @endif

        <!-- Botones de acción -->
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Editar Producto</a>

        <!-- Formulario de eliminación -->
        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar Producto</button>
        </form>
    </div>
@endsection
