@extends('layouts.layout')

@section('title', 'Nuevo Empleado')

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <div class="logo-container mb-4">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
        </div>

        <div class="text-box mb-4">
            <h1 class="font-weight-bold">Crear un Nuevo Empleado</h1>
        </div>
        
        <div class="card shadow-lg mx-auto">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-0">Formulario de Nuevo Empleado</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    @foreach(['first_name' => 'Nombre', 'last_name' => 'Apellido', 'hire_date' => 'Fecha de Contratación', 'address' => 'Dirección', 'phone' => 'Teléfono', 'email' => 'Email'] as $name => $label)
                        <div class="mb-4">
                            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                            <input type="{{ $name == 'hire_date' ? 'date' : ($name == 'email' ? 'email' : 'text') }}" name="{{ $name }}" id="{{ $name }}" class="form-control" required>
                        </div>
                    @endforeach

                    <!-- Campo para seleccionar el rol -->
                    <div class="mb-4">
                        <label for="role" class="form-label">Rol</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="admin">Administrador</option>
                            <option value="employee">Empleado</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 me-3">Agregar Empleado</button>
                    </div>
                    
                </form>
                <div class="card-footer text-center mt-3">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-lg px-4 mt-3">Volver a la Lista</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    /* Background Styling */
    .background-image {
        background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        padding: 40px 0;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Text Box Styling */
    .text-box {
        background-color: rgba(245, 140, 20, 0.85);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        padding: 15px 25px;
        border-radius: 10px;
    }

    /* Logo Styling */
    .logo {
        max-width: 140px;
    }

    /* Card Styling */
    .card {
        border-radius: 15px;
        border: none;
        opacity: 0.95;
        transition: transform 0.3s ease;
        margin-top: 20px;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Form Styling */
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
        text-align: left;
    }
    .form-control {
        border-radius: 5px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }
    .form-control:focus {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Button Styling */
    .btn {
        border-radius: 15px;
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #0062cc;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #0048a1;
    }
    .btn-secondary {
        background-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Alert Styling */
    .alert {
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>
@endsection
