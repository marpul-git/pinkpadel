<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        //dd($request);

        // Si la validación pasa, puedes continuar con el procesamiento de los datos

        Mail::to('marpul3@hotmail.com')->send(new ContactMailable($request->all()));

        return back()->with('success', '¡El mensaje se ha enviado correctamente!');

       
    }
}
