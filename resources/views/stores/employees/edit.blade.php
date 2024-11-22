@extends('layouts.layout')

@section('title', 'Editar Empleado - ' . $employee->first_name . ' ' . $employee->last_name)

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Información del Empleado</h1>

        <!-- Formulario para editar un empleado -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usamos PUT para actualizar los datos -->

            <!-- Campo para el primer nombre -->
            <div class="mb-3">
                <label for="first_name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
            </div>

            <!-- Campo para el apellido -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
            </div>

            <!-- Campo para la fecha de contratación -->
            <div class="mb-3">
                <label for="hire_date" class="form-label">Fecha de Contratación</label>
                <input type="date" class="form-control" id="hire_date" name="hire_date" 
                    value="{{ old('hire_date', \Carbon\Carbon::parse($employee->hire_date)->format('Y-m-d')) }}" required>
            </div>

            <!-- Campo para la dirección -->
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}">
            </div>

            <!-- Campo para el teléfono -->
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
            </div>

            <!-- Campo para el correo electrónico -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>

            <!-- Campo para el usuario asociado -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $employee->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para el rol -->
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" {{ old('role', $employee->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="employee" {{ old('role', $employee->role) == 'employee' ? 'selected' : '' }}>Empleado</option>
                </select>
            </div>

            <!-- Botón para guardar los cambios -->
            <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        </form>
    </div>
@endsection
