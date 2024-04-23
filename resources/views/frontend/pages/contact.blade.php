@extends('frontend.layouts.master')

@section('content')
    <!-- Page Content Wrap -->
    <div class="page_content_wrap page_paddings_no" >

        <!-- Contact form  -->
        <div class="content" style="background-color: #96bd42">
            <div class="sc_content content_wrap margin_top_null margin_bottom_null">
                <h3
                    class="sc_title sc_title_underline sc_align_center margin_top_small margin_bottom_null text_align_center color_white font_size_3_571em ">
                    Contactar</h3>
                    
                @if (session('success'))
                    <div class="alert alert-success">
                        <h3
                            class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">
                            {{ session('success') }}</h3>
                    </div>
                @endif
                <div class="sc_form_descr sc_item_descr">Rellene el formulario
                    y nos pondremos en contacto contigo
                 </div>
                <div class="flex justify-center items-center h-screen">
                    <div id="sc_form_1_wrap" class="sc_form_wrap">
                        <form method="POST" action="{{ route('contact') }}" class="max-w-md w-full " novalidate>
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div>
                                    <label for="username" class="block">Nombre</label>
                                    <input id="username" type="text" name="username" placeholder="Tu Nombre *" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    @error('username')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block">E-mail</label>
                                    <input id="email" type="text" name="email" placeholder="Tu E-mail *" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="subject" class="block">Asunto</label>
                                    <input id="subject" type="text" name="subject" placeholder="Asunto *" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    @error('subject')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="message" class="block">Mensaje</label>
                                <textarea id="message" name="message" placeholder="Escribe aquí tu consulta..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"></textarea>
                                @error('message')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="w-full  bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /Contact form  -->
        
    </div>
    
    @include('frontend.layouts.services')



@endsection
