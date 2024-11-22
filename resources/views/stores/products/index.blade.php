@extends('layouts.layout')

@section('title', 'Productos')

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
            background-color: rgba(20, 20, 20, 0.9); /* Fondo oscuro */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            margin: 20px;
            text-align: center;
            color: white;
        }

        .title {
            font-size: 40px;
            color: #4CAF50; /* Verde resplandeciente */
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 18px;
            margin: 10px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #f39c12;
        }

        .btn-primary:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #4b516d;
        }

        .btn-secondary:hover {
            background-color: #3e4453;
        }

        .product-item {
            background-color: rgba(75, 81, 109, 0.7); /* Fondo para cada producto */
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: left;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .product-item img {
            width: 150px; /* Tamaño fijo para la imagen */
            height: 150px;
            object-fit: cover; /* Ajusta la imagen dentro del cuadro */
            border-radius: 8px;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-info h2 {
            color: #4CAF50;
            margin: 0;
        }

        .product-info p {
            margin: 5px 0;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" style="width: 150px;">
        </div>

        <!-- Título de la página -->
        <div class="title">Productos</div>
        <p>Desde aquí puedes gestionar tus productos.</p>

        <!-- Botones de acción -->
        <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar Producto</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>

       <!-- Mostrar la lista de productos -->
<div class="product-list mt-4">
    @foreach ($products as $product)
        <div class="product-item">
            <!-- Imagen del producto -->
            <img src="{{ $product->image ? Storage::url($product->image) : asset('storage/images/default-image.jpg') }}" alt="{{ $product->name }}" />

            <!-- Información del producto -->
            <div class="product-info">
                <h2>{{ $product->name }}</h2>
                <p>Precio: S/. {{ number_format($product->sale_price, 2) }}</p>
                <a href="{{route('products.show', $product->id) }}" class="btn btn-secondary">Ver Detalles</a>
            </div>
        </div>
    @endforeach
</div>

<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Alinear columnas con espacio */
    }

    .product-item {
        width: 48%; /* Establecer un ancho del 48% para dos columnas */
        margin-bottom: 20px; /* Espacio entre filas */
    }

    .product-item img {
        max-width: 100%; /* Hacer que la imagen se ajuste al contenedor */
        height: auto; /* Mantener la relación de aspecto de la imagen */
    }
</style>

        <!-- Paginación -->
        <div class="pagination">
            {{$products->links()}}
        </div>
    </div>
@endsection
