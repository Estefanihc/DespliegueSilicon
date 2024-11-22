@extends('layouts.layout')

@section('title', 'Proveedores')

@section('content')
    <!-- Enlace a Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Estilo de fondo */
        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 20px 0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Estilo del logo */
        .logo-container {
            display: flex;
            justify-content: center;
            margin-top: -20px;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin: 0 auto;
        }

        /* Cuadro de bienvenida */
        .text-box {
            background-color: rgba(0, 0, 255, 0.7);
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
            color: white; /* Color del texto en el cuadro de bienvenida */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Tarjeta */
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            border: none;
            opacity: 0.95;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Estilo de encabezados */
        h1, h2 {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            font-family: 'Arial', sans-serif;
        }

        /* Tabla */
        .table {
            font-family: 'Arial', sans-serif;
            font-size: 1rem;
            color: #333;
            border-collapse: collapse;
        }

        .table-header {
            background-color: #f58c14;
            color: white;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd; /* Agregar bordes a las celdas */
        }

        .table th {
            background-color: #007bff; /* Cambiar el color del encabezado */
            color: white; /* Color del texto del encabezado */
        }

        /* Botones */
        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s;
            flex: 1; /* Asegura que ocupen el mismo espacio */
            margin: 0 10px; /* Espacio entre botones */
        }

        .btn-warning {
            background-color: #ff9800;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e68a00;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #0b2f7c;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Alertas */
        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 10px; /* Aumentar el padding de las alertas */
        }

        /* Ajustes para móviles */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .table {
                font-size: 0.9rem;
            }

            .logo {
                max-width: 150px; /* Reducir el tamaño del logo en pantallas pequeñas */
            }
        }
    </style>

    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <!-- Logo centrado -->
            <div class="logo-container mb-4">
                <img src="https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <div class="text-box mb-4">
                <h1 class="font-weight-bold">Bienvenido a la página de Proveedores</h1>
            </div>

            <div class="card shadow-lg mx-auto">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Lista de Proveedores</h2>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-success">Agregar Proveedor</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Regresar</a> <!-- Redirige al dashboard -->
                    </div>

                    <table class="table table-striped table-bordered mx-auto">
                        <thead>
                            <tr class="table-header">
                                <th>ID</th>
                                <th>Nombre de la Empresa</th>
                                <th>Dirección Fiscal</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Línea de Crédito</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->company_name }}</td>
                                    <td>{{ $supplier->fiscal_address }}</td>
                                    <td>{{ $supplier->email ?? 'N/A' }}</td>
                                    <td>{{ $supplier->phone ?? 'N/A' }}</td>
                                    <td>{{ $supplier->credit_line ? '$' . number_format($supplier->credit_line, 2) : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="pagination">
                    {{$suppliers->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
