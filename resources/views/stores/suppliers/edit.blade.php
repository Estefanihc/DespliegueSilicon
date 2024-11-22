@extends('layouts.layout')

@section('title', 'Editar Proveedor')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <!-- Logo centrado -->
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <h1 class="mb-4 text-background">Editar Proveedor</h1>

            <div class="outer-card shadow-lg mx-auto">
                <div class="inner-card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Formulario de Proveedor</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $supplier) }}" method="POST" novalidate>
                            <!-- TOKEN DE SEGURIDAD -->
                            @csrf

                            <!-- Directiva para indicar el método PUT -->
                            @method('put')

                            <div class="form-group mb-3">
                                <label for="company_name">Nombre de la Empresa</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $supplier->company_name) }}" required>
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="fiscal_address">Dirección Fiscal</label>
                                <input type="text" class="form-control" id="fiscal_address" name="fiscal_address" value="{{ old('fiscal_address', $supplier->fiscal_address) }}" required>
                                @error('fiscal_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" value="{{ old('email', $supplier->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+51 999 999 999" value="{{ old('phone', $supplier->phone) }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="credit_line">Línea de Crédito</label>
                                <input type="number" step="0.01" class="form-control" id="credit_line" name="credit_line" placeholder="0.00" value="{{ old('credit_line', $supplier->credit_line) }}">
                                @error('credit_line')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          
                            <div class="d-flex justify-content-between mb-4">
                                <button type="submit" class="btn btn-success">Editar Proveedor</button>
                                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
