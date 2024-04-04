@extends('frontend.layouts.master')




@section('content')

    <div class="container">
        <div style="margin-left: 8rem; margin-right: 8rem;" class="">
            <div class="flex flex-row items-center justify-between hover:flex-col">

                <div id="fecha" class="text-center flex  flex-col">
                    <h3 class="bg-red-600 text-white text-lg "
                        style="border: 1px solid #CBD5E0; border-radius: 10px 10px 0 0;">DÍA</h3>
                    <p class="pt-3 px-3 " style="font-size: 35px;border: 1px solid #CBD5E0;">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $selectedDate)->format('d-m-Y') }}</p>
                </div>


                <div id="cabecera" class=" px-3 rounded-lg flex" style="background-color: #99c237">
                    <div class="sm:text-sm">
                        <form id="dateForm" method="POST" action="{{ route('check_date') }}" novalidate>
                            @csrf
                            <x-date-input value="{{ $selectedDate }}" class="text-xl">
                                <div class="text-center text-xl mt-0 text-white">{{ __('CONSULTA OTRA FECHA') }}</div>
                            </x-date-input>
                            @error('date_input')
                                <span class="text-danger text-red-600">{{ $message }}</span>
                            @enderror
                            <x-primary-button class="w-full justify-center mt-3 " >
                                <div class="text-xl">{{ __('CONSULTAR') }}</div>
                            </x-primary-button>
                        </form>
                    </div>
                </div>
                <div class=" flex text-center hover:flex-col">
                    <div id="whatsapp" class="">

                        <!-- <p class="">Reserva tu pista por WhatsApp</p> -->
                        <img src="{{ asset('frontend/images/reserva.png') }}" alt="Logo WhatsApp" class="">

                       <!-- <strong style="font-size: 30px">610394363</strong> -->
                    </div>

                </div>
            </div>
        </div>
       
        <div class="mx-auto">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-600 overflow-hidden">
                        <div class="flex flex-row justify-between">
                            <h4 class="pb-3 text-gray-500"><b>CI</b>- Pista de Cristal Interior </h4>
                            <h4 class="pb-3 text-gray-500"><b>MI</b>- Pista de Muro Interior </h4>
                            <h4 class="pb-3 text-gray-500"><b>CE</b>- Pista de Cristal Exterior </h4>
                            <h4 class="pb-3 text-gray-500"><b> ME</b>- Pista de Muro Exterior</h4>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-center text-xl font-bold text-gray-700 uppercase tracking-wider w-15 whitespace-nowrap">
                                            Sección</th>
                                        @foreach ($courts as $court)
                                            <th
                                                class="px-6 py-3  text-center text-xl font-bold text-gray-700 uppercase tracking-wider w-10">
                                                {{ $court->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($sections as $index => $section)
                                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
                                            <td class="px-6 py-2 whitespace-nowrap text-center">
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                                            </td>
                                            @foreach ($courts as $court)
                                                <td class="px-6 py-2 whitespace-nowrap text-center">
                                                    @if ($eventData[$section->id][$court->id] === 'Libre')
                                                        <strong style="background-color: lightgreen"
                                                            class=" px-2 py-1 rounded-lg">Libre</strong>
                                                    @else
                                                        @if ($eventData[$section->id][$court->id]->state === 'FIN')
                                                            <strong style="background-color: lightgray"
                                                                class=" px-2 py-1 rounded-lg">Cerrada</strong>
                                                        @else
                                                            <strong style="background-color: salmon"
                                                                class="bg-red-400 px-2 py-1 rounded-lg">Ocupada</strong>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
