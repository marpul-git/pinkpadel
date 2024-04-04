
{{--
<x-app-layout>
     @include('frontend/layouts/top_panel')
   
    
   

    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_3  title_present_inner breadcrumbs_present_inner">
            <div class="content_wrap">
                <h1 class="page_title">Elige la fecha</h1>
                
            </div>
        </div>
    </div>
    
    @include('frontend/layouts/plantilla')
    --}}
    <div class="h-15vh w-80vw mx-auto mt-10 flex flex-col">
        <div class="flex flex-row h-full">
          <div class="w-full h-full bg-blue-400">Contenido 1</div>
          <div class="w-full h-full flex flex-col">
            <div class="w-full h-1/2 bg-green-400">Contenido 2 - Fila 1</div>
            <div class="w-full h-1/2 bg-yellow-400">Contenido 2 - Fila 2</div>
          </div>
          <div class="w-full h-full flex flex-col">
            <div class="w-full h-1/2 bg-red-400">Contenido 3 - Fila 1</div>
            <div class="w-full h-1/2 bg-purple-400">Contenido 3 - Fila 2</div>
          </div>
        </div>
      </div>
    
    <div class="w-1/2 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <form method="POST" action="{{ route('check_date') }}" novalidate>
                @csrf
                <x-date-input value="{{now()->format('Y-m-d')}}" >
                    {{ __('') }}
                </x-date-input>
                @error('date_input')
                <span class="text-danger text-red-600">{{ $message }}</span>
            @enderror
                
                <x-primary-button class="w-full mt-4 justify-center" style="background-color: #6c397d">
                    {{ __('Ver disponibilidad') }}
                </x-primary-button>
            </form>
        </div>

    </div>
{{--
</x-app-layout>
--}}