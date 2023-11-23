@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo evento</h1>
@stop
@section('content')
    <div class='card'>

        <div class='card-body'>
            <form action="{{ route('admin.events.store') }}" method="POST" autocomplete="off">
                @csrf
        
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control col-2" value="{{ $selectedDate ?? now()->format('Y-m-d') }}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                @include('admin.events.partials.form')
        
                <div class="form-group ml-3">
                    <label for="section_id">Secciones</label><br>
                    <div class="row">
                        @foreach ($sections as $sectionId => $section)
                            <div class="col-md-4">
                                <label class="form-check-label">
                                    <input type="checkbox" name="section_id[]" value="{{ $sectionId }}" class="form-check-input">
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }}
                                    - {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="form-group row">
                    <div class="col">
                        <label for="user1_id">Jugador 1</label>
                        <select name="user1_id" id="user1_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                        @error('user1_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col">
                        <label for="user2_id">Jugador 2</label>
                        <select name="user2_id" id="user2_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col">
                        <label for="user3_id">Jugador 3</label>
                        
                        <select name="user3_id" id="user3_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col">
                        <label for="user4_id">Jugador 4</label>
                        <select name="user4_id" id="user4_id" class="form-control" placeholder="Seleccione un jugador">
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
        
                </div>
        
                <button type="submit" class="btn btn-primary">Crear evento</button>
            </form>
        </div>
        


    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // Obtener todos los checkboxes de secciones
        const sectionCheckboxes = document.querySelectorAll('input[name="section_id[]"]');

        sectionCheckboxes.forEach(checkbox => {
            // Agregar un listener para el evento de cambio
            checkbox.addEventListener('change', function() {
                // Obtener el índice del checkbox actual
                const currentIndex = [...sectionCheckboxes].indexOf(checkbox);

                // Obtener el estado del checkbox actual
                const isChecked = checkbox.checked;

                // Si se está marcando un checkbox
                if (isChecked) {
                    // Buscar checkboxes anteriores marcados y marcar los intermedios
                    for (let i = currentIndex - 1; i >= 0; i--) {
                        if (sectionCheckboxes[i].checked) {
                            for (let j = i + 1; j < currentIndex; j++) {
                                sectionCheckboxes[j].checked = true;
                            }
                            break;
                        }
                    }

                    // Buscar checkboxes siguientes marcados y marcar los intermedios
                    for (let i = currentIndex + 1; i < sectionCheckboxes.length; i++) {
                        if (sectionCheckboxes[i].checked) {
                            for (let j = currentIndex + 1; j < i; j++) {
                                sectionCheckboxes[j].checked = true;
                            }
                            break;
                        }
                    }
                } else {
                    // Si se está desmarcando un checkbox, desmarcar todos los intermedios
                    for (let i = currentIndex - 1; i >= 0; i--) {
                        if (sectionCheckboxes[i].checked) {
                            for (let j = i + 1; j < currentIndex; j++) {
                                sectionCheckboxes[j].checked = false;
                            }
                            break;
                        }
                    }

                    for (let i = currentIndex + 1; i < sectionCheckboxes.length; i++) {
                        if (sectionCheckboxes[i].checked) {
                            for (let j = currentIndex + 1; j < i; j++) {
                                sectionCheckboxes[j].checked = false;
                            }
                            break;
                        }
                    }
                }
            });
        });

        // Capturamos el campo "Usuario" y el campo "Jugador 1" utilizando su identificador único
        const usuarioInput = document.querySelector('#user_id');
        const jugador1Input = document.querySelector('#user1_id');

        // Agregamos un evento "change" al campo "Usuario" para que se ejecute cuando cambie su valor
        usuarioInput.addEventListener('change', function() {
            // Asignamos el valor del campo "Usuario" al campo "Jugador 1"
            jugador1Input.value = usuarioInput.value;
        });

        
    </script>
@stop

