<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//HomeController
//controlador que almacena la lógica para la vista principal (Home).

class HomeController extends Controller
{
    //Crear el método principal del aplicativo
    public function __invoke()
    {
        return view('home');
    }
}
