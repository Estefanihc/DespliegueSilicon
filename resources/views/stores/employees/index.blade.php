@extends('layouts.layout')

@section('title', 'Lista de Empleados')

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <div class="logo-container mb-4">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
        </div>

        <h1 class="mb-4 text-background">Lista de Empleados</h1>

        <div class="outer-card shadow-lg mx-auto">
            <div class="inner-card">
                <div class="card-header bg-primary text-white rounded-title mb-3">
                    <h2 class="mb-0">Empleados Registrados</h2>
                </div>

                <div class="card-body">
                    <!-- Tabla de empleados -->
                    <table class="table table-hover mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de Contratación</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Rol</th> <!-- Nueva columna de Rol -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name ?? 'NULL' }}</td>
                                    <td>{{ $employee->last_name ?? 'NULL' }}</td>
                                    <td>{{ $employee->hire_date ?? 'NULL' }}</td>
                                    <td>{{ $employee->address ?? 'NULL' }}</td>
                                    <td>{{ $employee->phone ?? 'NULL' }}</td>
                                    <td>{{ $employee->email ?? 'NULL' }}</td>
                                    <td>{{ $employee->role ?? 'NULL' }}</td> <!-- Muestra el rol del empleado -->
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Paginación -->
                    {{ $employees->links() }}

                    <!-- Botones debajo de la tabla -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('employees.create') }}" class="btn btn-custom-success">Agregar Empleado</a>
                        <a href="{{ url()->previous() }}" class="btn btn-custom-warning ml-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
    }

    

    .background-image {
        background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        padding: 60px 20px;
        color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-container {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .logo {
        max-width: 150px;
        height: auto;
        filter: drop-shadow(0 0 5px #fff);
    }

    .text-background {
        background-color: rgba(245, 140, 20, 0.8);
        color: #fff;
        padding: 20px 40px;  /* Aumenté más el padding para que rellene mejor */
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.6);
        display: inline-block;
    }

    .outer-card {
        border-radius: 15px;
        background-color: rgba(15, 15, 50, 0.85); /* Fondo más oscuro */
        padding: 40px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.4);
    }

    .card-header {
        background-color: #007bff;
        border-radius: 12px 12px 0 0;
        padding: 10px;
        position: relative;
    }

    .rounded-title {
        border-radius: 15px;
        padding: 8px 15px;
        font-size: 1.2rem;
        background-color: #0056b3;
        display: inline-block;
        margin: auto;
    }

    .table {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(32, 22, 22, 0.1);
        border: none;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 12px 15px;
    }

    .table th {
        background-color: #0056b3;
        color: #fff;
        font-weight: bold;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.2);
        cursor: pointer;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-custom-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-custom-success:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    .btn-custom-warning {
        background-color: #ffaf38;
        color: #fff;
    }   

    .btn-custom-warning:hover {
        background-color: #d39e00;
        transform: scale(1.05);
    }

    /* Ajuste de espacio en la viñeta */
    .mb-3 {
        margin-bottom: 20px !important;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2.5rem;
        }

        .table {
            font-size: 14px;
        }

        .logo {
            max-width: 100px;
        }
    }
</style>
@endsection