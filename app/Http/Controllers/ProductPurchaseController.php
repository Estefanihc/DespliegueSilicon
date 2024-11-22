<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    //método para mostrar la página principal de los empleados
    public function index() {
        return view('stores.productsPurchases.index');
    }

    //método para mostrar el formulario para crear un nuevo empleado
    public function create() {
        return view('stores.productsPurchases.create');
    }

    //método para mostrar la información de un empleado en específico
    public function show($productPurchase) {
        return view('stores.productsPurchases.show', compact('productPurchase'));
    }
}
