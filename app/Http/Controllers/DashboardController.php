<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtén una compra específica, por ejemplo, la última compra
        $purchase = Purchase::latest()->first(); // Cambia esto según tu lógica

        // Devuelve la vista con la compra
        return view('dashboard', compact('purchase')); // Esta vista solo se mostrará si el usuario está autenticado
    }
}
