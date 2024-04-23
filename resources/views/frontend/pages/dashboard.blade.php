@extends('frontend.layouts.master')


@section('content')
    {{--



@include('dashboard')
--}}
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_3  title_present_inner breadcrumbs_present_inner">
            <div class="content_wrap">
                <h1 class="page_title">RESERVA TU PISTA</h1>
               
            </div>
        </div>
    </div>

    
    <div class="mx-auto sm:px-6 lg:px-20">


        <div class="flex flex-row sm:flex-col">
            <div class="w-full ">
                <p class="mb-4 mt-4 text-center text-lg">Cerramiento Cristal</p>
                <div class="px-3">
                    <img src="{{ asset('frontend/images/pista_cristal.jpeg') }}" alt="Foto pista cristal" >
                </div>
            </div>
            <div class="w-full " >
                <p class="mb-4 mt-4 text-center text-lg">Cerramiento Muro</p>
                <div class="px-3">
                    <img src="{{ asset('frontend/images/pista_muro.jpeg') }}" alt="Foto pista muro" >
                </div>
            </div>
        </div>
        <div>
            <h3 class="mt-2 px-4">-Todas nuestras pistas disponen de luz artificial</h3>
        </div>
        
        @include('frontend.layouts.membership') 



        <div id="availability" class="py-5 mb-5">
            <div class="w-1/2 mx-auto sm:px-6 lg:px-8">

                <form method="POST" class="w-1/2" action="{{ route('check_date') }}" novalidate>
                    @csrf
                    <x-date-input value="{{ now()->format('Y-m-d') }}" class="text-center text-lg text-gray-800 w-1/2">
                        <strong class="text-gray-600">
                        {{ __('INTRODUCE LA FECHA PARA VER DISPONIBILIDAD') }}
                    </strong>
                    </div>
                    </x-date-input>
                    @error('date_input')
                        <span class="text-danger text-red-600">{{ $message }}</span>
                    @enderror

                    <x-primary-button class="w-full mt-4 mb-4 justify-center text-gray-800 text-4xl" style="background-color: #96BD42">
                        {{ __('Ver disponibilidad') }}
                    </x-primary-button>
                </form>
            </div>

        </div>

    </div>
    
@endsection
