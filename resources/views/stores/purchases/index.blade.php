@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
    <!-- Enlace a Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Aplicar la fuente a todo el cuerpo */
        }

        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
            color: #fff;    
        }

        .logo {
            max-width: 180px;
            height: auto;
            margin-left: 37%;
        }

        .outer-card {
            width: 1000px; /* Controlar el ancho */
            max-width: 1200px; /* Limitar el ancho máximo */
            height: auto; /* El alto se ajustará según el contenido */
            min-height: 400px; /* Asegurar que el alto no sea menor que 400px */
            padding: 25px; /* Ajustar el padding */
            margin: 20px auto; /* Centrado con margen en la parte superior e inferior */
            border-radius: 20px;
            background-color: rgba(16, 13, 59, 0.95);
            transition: transform 0.3s ease;
            position: left;
        }


        .outer-card:hover {
            transform: scale(1.05);
        }

        .btn {
            border-radius: 50px; /* Cambiar los bordes de los botones a estilo más moderno */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding: 8px 20px;
            margin-bottom: 10%;
            font-size: 16px;
            font-weight: 600;
            width: 48%; /* Ancho consistente para los botones */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            padding-top: 2%;
            padding-bottom: 2%;
            text-align: center;
            color: #fff;
        }

        .btn-info {
            background-color: #55b5c4;
            color: #fff;
        }

        .form-control {
            padding: 12px;
            font-size: 20px;
            border-radius: 8px;
            border: 1px solid #ddd1;
            transition: box-shadow 0.3s ease;
            color: #1a1a1a;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .list-unstyled li {
            margin-bottom: 10px; /* Espaciado entre botones */
        }

        /* Estilos para cuatro columnas */
        #purchaseList {
            display: flex;
            flex-wrap: wrap;
            list-style-type: none; /* Asegúrate de que la lista no tenga puntos */
            padding: 1%; /* Eliminar el padding por defecto */
        }

        .purchase-item {
            width: 280px; /* Establecer un ancho del 23% para cuatro columnas */
            margin-right: 2%; /* Espacio entre las columnas */
            margin-bottom: 30px; /* Espacio entre filas */
        }

        
        .bg-navy {
            background-color: #001f3f; /* Azul marino */
        }

        .img-size {
            max-width: 140px; /* Ajusta el tamaño de la imagen según prefieras */
            height: auto;
        }
    </style>

    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <a href="{{ route('purchases.create') }}" class="btn btn-primary">Agregar Compra</a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
                
                <div class="inner-card p-4">
                    <div class="card-body">
                        <!-- Mensaje de confirmación -->
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Buscar Productos -->
                        <div class="mt-4">
                            <h4>Buscar Compras:</h4>
                            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar por nombre o código">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Buscar</a>
                        </div>

                        <!-- Lista de compras -->
                        <div class="mt-4">
                            <h1>Ver Compras:</h1>
                            <ul id="purchaseList" class="list-unstyled">
                                @foreach ($purchases as $purchase)
                                    <li class="purchase-item">
                                        <div class="w-full p-4">
                                            <div class="producto text-center bg-navy p-6 rounded-lg shadow-lg">
                                                <!-- Imagen del producto -->
                                                <img src="https://img.freepik.com/vector-gratis/paquete-caja-entrega-modelo-3d_78370-825.jpg" 
                                                     alt="Producto {{ $purchase->id }}" 
                                                     class="mx-auto mb-4 img-size">
                                                
                                                <!-- Información de la compra (número CIAF, cantidad, precio) -->
                                                <h3 class="text-lg font-semibold">Compra #{{ $purchase->id }}</h3>
                                                <p><strong>Número de CIAF:</strong> {{ $purchase->ciaf_number }}</p>
                                                <p><strong>Cantidad:</strong> {{ $purchase->quantity }}</p>
                                                <p><strong>Precio:</strong> S/ {{ number_format($purchase->price, 2) }}</p>
                                                <p>------------------------</p> 
                        
                                                <!-- Enlace para editar detalles de la compra -->
                                                <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-checklist mb-2">
                                                    Editar Compra
                                                </a>
                                                <!-- Botón para eliminar la compra -->
                                                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta compra?');" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-info btn-checklist mb-2">Eliminar Compra</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    {{$purchases->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
