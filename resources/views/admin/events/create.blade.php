@extends('adminlte::page')

@section('title', 'Crear Eventos')

@section('content_header')
    <h4 class="ml-3"> Crear Evento</h4>
@stop
@section('content')
    <div class='card text-primary bg-light'>
        <div>
            @if (session('error'))
                <div class="card-header alert alert-danger">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
        </div>
        <div class='card-body'>
            <form action="{{ route('admin.events.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="form-group ">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control  col-md-4 col-lg-2  text-right"
                        value="{{ old('date', $selectedDate ?? now()->format('Y-m-d')) }}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @include('admin.events.partials.form')
      

                <div class="container ">
                    <label for="section_id">Secciones</label>
                    <div class="btn-group flex flex-wrap form-check" role="group"
                        aria-label="Basic checkbox toggle button group">
                        @foreach ($allSections as $sectionId => $section)
                            <label class="btn btn-outline-primary mr-1 rounded-lg form-label" for="{{ $section->id }}">
                                <input type="checkbox" name="section_id[]" class="btn-check mr-1 " id="{{ $section->id }}"
                                    value="{{ $section->id }}" autocomplete="off"
                                    {{ is_array(old('section_id')) && in_array($section->id, old('section_id')) ? 'checked' : '' }}>


                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }}
                                - {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                            </label>
                        @endforeach
                    </div>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 col-lg-3">
                        <label for="user1_id">Jugador 1</label>
                        <select name="user1_id" id="user1_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ old('user1_id') == $userId ? 'selected' : '' }}>
                                    {{ $userName }}
                                </option>
                            @endforeach
                        </select>
                        @error('user1_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <label for="user2_id">Jugador 2</label>
                        <select name="user2_id" id="user2_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un Usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ old('user2_id') == $userId ? 'selected' : '' }}>
                                    {{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <label for="user3_id">Jugador 3</label>
                        <select name="user3_id" id="user3_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ old('user3_id') == $userId ? 'selected' : '' }}>
                                    {{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <label for="user4_id">Jugador 4</label>
                        <select name="user4_id" id="user4_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ old('user4_id') == $userId ? 'selected' : '' }}>
                                    {{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>

                    <button type="submit" class="btn btn-primary btn-block ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        Nuevo Evento</button>
                </div>
            </form>
        </div>



    </div>
@stop

@section('js')

    <script>
        $(document).ready(function() {
            // Obtener todos los checkboxes de secciones
            const sectionCheckboxes = $('input[name="section_id[]"]');

            sectionCheckboxes.change(function() {
                // Obtener el estado del checkbox actual
                const isChecked = $(this).prop('checked');

                // Cambiar el color de fondo del checkbox actual
                const label = $(this).closest('label');
                if (isChecked) {
                    label.css('background-color', 'blue');
                    label.css('color', 'white');
                } else {
                    label.css('background-color', ''); // Restaurar el color por defecto
                    label.css('color', 'blue');
                }
            });

            // Capturar el campo "Usuario" y el campo "Jugador 1" utilizando sus identificadores únicos
            const usuarioInput = $('#user_id');
            const jugador1Input = $('#user1_id');

            // Agregar un evento "change" al campo "Usuario"
            usuarioInput.change(function() {
                // Asignar el valor del campo "Usuario" al campo "Jugador 1"
                jugador1Input.val(usuarioInput.val());
            });
        });
    </script>
@stop
