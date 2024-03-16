@extends('frontend.layouts.master')


@section('content')
{{--
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Has iniciado sesión!') }}
                </div>
            </div>
            <form method="POST" action="{{ route('check_date') }}" novalidate>
                @csrf
                <x-date-input value="{{now()->format('Y-m-d')}}" >
                    {{ __('Elige la fecha') }}
                </x-date-input>
                @error('date_input')
                <span class="text-danger text-red-600">{{ $message }}</span>
            @enderror
                
                <x-primary-button class="w-full mt-4 justify-center">
                    {{ __('Ver disponibilidad') }}
                </x-primary-button>
            </form>
        </div>

    </div>
--}}

@include('dashboard')

@endsection

