<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index() 
    {
        return view('contactanos.index');
    }

    public function store(Request $request) 
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Enviar el correo
        Mail::to('prueba_silicon@example')->send(new ContactanosMailable($request->all()));
        
        // Mensaje de confirmación y redirección
        session()->flash('info', 'Mensaje enviado correctamente.');
        return redirect()->route('contactanos.index');
    }
}
