@extends('frontend.layouts.master')




@section('content')



<div class="grid grid-cols-3  max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        
    <div id="cabecera" class="p-4 bg-gray-200 col-span-2 sm:col-span-1 lg:col-span-2 xl:col-span-1" >
        <div class="w-1/2">
            <form method="POST" action="{{ route('check_date') }}" novalidate>
                @csrf
                <x-date-input  value="{{$selectedDate}}">
                    <div class="text-center text-sm">{{ __('Consulta otra fecha') }}</div>
                </x-date-input>
                @error('date_input')
                <span class="text-danger text-red-600">{{ $message }}</span>
            @enderror
                <x-primary-button class="w-full mt-4 justify-center">
                    {{ __('CONSULTAR') }}
                </x-primary-button>
            </form>
        </div>
       
    </div>

    <div id="fecha" class="p-4 bg-gray-200 col-span-2 sm:col-span-1 lg:col-span-2 xl:col-span-1 text-center" >
        <strong style="font-size: 50px"> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $selectedDate)->format('d-m-Y') }}</strong>
    </div>
    <div id="whatsapp" class="p-4 bg-gray-200 col-span-2 sm:col-span-1 lg:col-span-2 xl:col-span-1" >
        <img src="{{ asset('frontend/images/whatsapp.png') }}" alt="Logo WhatsApp" class="w-auto h-20">

    </div>
</div>



<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-15 whitespace-nowrap">Sección</th>
                                @foreach ($courts as $court)
                                <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-10">{{ $court->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($sections as $index => $section)
                            <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
                                <td class="px-6 py-2 whitespace-nowrap text-center">
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                                </td>
                                @foreach ($courts as $court)
                                <td class="px-6 py-2 whitespace-nowrap text-center">
                                    @if ($eventData[$section->id][$court->id] === 'Libre')
                                    <strong   style="background-color: lightgreen" class=" px-2 py-1 rounded-lg">Libre</strong>
                                    @else

                                         @if ($eventData[$section->id][$court->id]-> state === 'FIN')

                                         <strong style="background-color: lightgray" class=" px-2 py-1 rounded-lg">Cerrada</strong>

                                         @else

                                            <strong  style="background-color: salmon" class="bg-red-400 px-2 py-1 rounded-lg">Ocupada</strong>
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

@endsection



