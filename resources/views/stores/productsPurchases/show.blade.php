<!-- Heredar el código de la plantilla -->
@extends('layouts.layout')

<!-- Modificar la sección del título -->
@section('title', 'Producto/Compra ' . $productPurchase)

<!-- Personalizar el contenido de la página (content)-->
@section('content')
    <h1>Está viendo la información de la relación producto -> compra: {{$productPurchase}}</h1>
@endsection