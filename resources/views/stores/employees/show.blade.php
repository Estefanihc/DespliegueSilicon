@extends('layouts.layout')

@section('title', 'Detalles del Empleado - ' . $employee->first_name . ' ' . $employee->last_name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Detalles del Empleado</h1>
                <p class="lead">Está viendo la información del empleado: <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong></p>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información Básica</h5>
                        <p><strong>Nombre:</strong> {{ $employee->first_name }} {{ $employee->last_name }}</p>
                        <p><strong>Email:</strong> 
                            @if($employee->email)
                                {{ $employee->email }}
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                        <p><strong>Fecha de Contratación:</strong> 
                            @if($employee->hire_date)
                                {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                        <p><strong>Teléfono:</strong> 
                            @if($employee->phone)
                                {{ $employee->phone }}
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                        <p><strong>Dirección:</strong> 
                            @if($employee->address)
                                {{ $employee->address }}
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                        <p><strong>ID de Usuario:</strong> 
                            @if($employee->user_id)
                                {{ $employee->user_id }}
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                        <p><strong>Rol:</strong> 
                            @if($employee->role)
                                {{ ucfirst($employee->role) }} <!-- Muestra el rol capitalizado -->
                            @else
                                <em>NULL</em>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
