<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'username' => 'required|max:25',
            'email' => 'required|email',
            'subject' => 'required|max:30',
            'message' => 'required|max:300',
        ]);
        dd($request);

        // Si la validación pasa, puedes continuar con el procesamiento de los datos

        // Por ejemplo, aquí puedes guardar los datos en la base de datos, enviar un correo electrónico, etc.

        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
