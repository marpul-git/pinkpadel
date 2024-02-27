@extends('adminlte::page')

@section('title', 'Actualizar Usuario')

@section('content_header')
    <h4 class="ml-3">Actualizar Usuario</h4>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class='card bg-light col-10'>

        <div class="card-header  row ">

            <a class="btn btn-info mt-2 ml-2" href="{{ route('admin.users.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                </svg> Volver</a>
            <h5 class="ml-5 ">Nombre: <span class="ml-3 text-xl text-primary">{{ $user->name }} </span></h5>
        </div>

        <div class='card-body'>



            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <p class="mt-4">Marcado roles actuales, señala ó desmarca para actualizar</p>


                {{--
                
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline ">
                        <label>
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1"
                                {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                  
                  
                  
            --}}

                <div class="btn-group d-flex form-check justify-content-center" role="group"
                    aria-label="Basic checkbox toggle button group">

                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline ">
                            <label class="btn btn-primary mr-1 rounded-lg form-label" for="{{ $role->id }}">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="btn-check mr-1 " id="{{ $role->id }}"
                                    {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                </div>








                <p class="mt-4"> Pulsa la Tarifa y el Nivel (Seleccionada con tono más oscuro) </p>

                <div class="btn-group btn-group-toggle d-flex flex-lg-row flex-column" data-toggle="buttons">
                    <strong class="align-middle mr-3">Tarifa </strong>
                    @foreach ($tariffs as $tariff)
                        <label class="btn btn-primary active rounded ml-2">
                            <input type="radio" name="tariff" value="{{ $tariff->id }}"
                                class="form-check-input  " id="{{ $tariff->id }}" autocomplete="off"
                                {{ $tariff->id == $user->tariff_id ? 'checked' : '' }}>
                            {{ $tariff->name }}</label>
                    @endforeach

                </div>


                <hr>


                <div class="btn-group btn-group-toggle d-flex flex-lg-row flex-column" data-toggle="buttons">
                    <strong class="align-middle mr-3">Nivel </strong>
                    @foreach ($levels as $key => $level)
                        <label class="btn btn-primary active rounded ml-1">
                            <input type="radio" name="level" value="{{ $level }}"
                                class="form-check-input  " id="{{ $key }}" autocomplete="off"
                                {{ $level == $user->level ? 'checked' : '' }}>
                            {{ $level }}</label>
                    @endforeach

                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-info btn-block mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-up " viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg>
                        <strong class="ml-2"> Actualizar Datos </strong>
                    </button>

                </div>


            </form>


        </div>

    </div>
@stop

@section('js')

<script>
    $(document).ready(function() {
        // Función para cambiar el color de fondo del label
        function cambiarColorFondo(label, isChecked) {
            if (!isChecked) {
                label.css('background-color', label.data('original-bg'));
                
            } else {
                label.data('original-bg', label.css('background-color'));
                label.css('background-color', 'darkblue');
                
            }
        }

        // Seleccionar todos los checkboxes dentro de la clase form-check
        $('.form-check input[type="checkbox"]').each(function() {
            const isChecked = $(this).prop('checked');
            const label = $(this).closest('label');
            cambiarColorFondo(label, isChecked);
        });

        // Asociar la función al evento de cambio del checkbox
        $('.form-check input[type="checkbox"]').change(function() {
            const isChecked = $(this).prop('checked');
            const label = $(this).closest('label');
            cambiarColorFondo(label, isChecked);
        });
    });
</script>





@stop