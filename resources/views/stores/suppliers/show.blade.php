<!-- Heredar el código de la plantilla -->
@extends('layouts.layout')

<!-- Modificar la sección del título -->
@section('title', 'Proveedor ' . $supplier)

<!-- Personalizar el contenido de la página (content)-->
@section('content')
    <h1>Está viendo la información del proveedor: {{$supplier}}</h1>
@endsection