@extends('adminlte::page')

@section('title', 'Modificar un Evento')

@section('content_header')

@stop

@section('content')

    <div class='card  bg-light '>
        <div class="card-header">
            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-success">
                    <strong>{{ session('info') }}</strong>
                </div>
            @endif
            <h4 class="ml-3">Editar Evento</h4>
        </div>

        <div class='card-body'>

            <form action="{{ route('admin.events.update', $event) }}" method="POST" autocomplete="off">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-lg-4 col-sm-3">
                        <label for="date">Fecha</label>
                        <input type="date" name="date" id="date" class="form-control col-lg-8 "
                            value="{{ $event->date }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-8  col-sm-9">
                        <label for="user_id">Usuario</label>
                        <select name="user_id" id="user_id" class="form-control col-lg-10">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!----------------------------------------------------------------------->

                <div>
                    <div class="row">
                        <div class="form-group col-lg-3 ml-1">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control col-8"
                                placeholder="Seleccione el tipo de evento">
                                <option value="PARTIDO">PARTIDO</option>
                                <option value="SNP">SNP</option>
                                <option value="FAP">FAP</option>
                                <option value="ENTRENAMIENTO">ENTRENAMIENTO</option>
                                <option value="OTRO">OTRO</option>
                            </select>

                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="state">Estado</label>
                            <select name="state" id="state" class="form-control col-8"
                                placeholder="Seleccione el estado del evento">
                                <option value="RESERVADO">RESERVADO</option>
                                <option value="ALQUILADO">ALQUILADO</option>
                                <option value="FIN">FIN</option>
                            </select>

                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-2">
                            <label for="price">Precio</label>
                            <input type="number" name="price" value="{{ $event->price }}" id="price"
                                class="form-control col-6" placeholder="€" step="0.01">

                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="court_id">Pista</label>
                            <select name="court_id" id="court_id" class="form-control col-12">
                                @foreach ($courts as $courtId => $court)
                                    <option value="{{ $courtId }}"
                                        {{ $event->court_id == $courtId ? 'selected' : '' }}>{{ $court }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>

                <!----------------------------------------------------------------------->
                <div class="container ">
                    <label for="section_id">Secciones</label>
                    <div class="btn-group flex flex-wrap form-check" role="group"
                        aria-label="Basic checkbox toggle button group">



                        @foreach ($allSections as $sectionId => $section)
                            <label class="btn btn-outline-primary mr-1 rounded-lg form-label" for="{{ $section->id }}">
                                @php
                                    $isChecked = in_array($sectionId, $event->sections->pluck('id')->toArray());
                                @endphp
                                <input type="checkbox" name="section_id[]" value="{{ $section->id }}"
                                    class="btn-check mr-1 " id="{{ $section->id }}" autocomplete="off"
                                    {{ $isChecked ? 'checked ' : '' }}>
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section['start_time'])->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section['end_time'])->format('H:i') }}
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
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}"
                                    {{ $event->player->user1_id == $userId ? 'selected' : '' }}>{{ $userName }}
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
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}"
                                    {{ $event->player->user2_id == $userId ? 'selected' : '' }}>{{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <label for="user3_id">Jugador 3</label>
                        <select name="user3_id" id="user3_id" class="form-control" placeholder="Seleccione un jugador">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}"
                                    {{ $event->player->user3_id == $userId ? 'selected' : '' }}>{{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <label for="user4_id">Jugador 4</label>
                        <select name="user4_id" id="user4_id" class="form-control" placeholder="Seleccione un jugador">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}"
                                    {{ $event->player->user4_id == $userId ? 'selected' : '' }}>{{ $userName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary  btn-block ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                        </svg>
                        Actualizar evento</button>
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
                    label.css('background-color', ''); // Restaurar el color anterior
                    label.css('color', 'blue');
                }


            });

            sectionCheckboxes.each(function() {
                const isChecked = $(this).prop('checked');
                const label = $(this).closest('label');

                if (isChecked) {
                    label.css('background-color', 'blue');
                    label.css('color', 'white');
                } else {
                    label.css('background-color', '');
                    label.css('color', 'blue'); // Restaurar el color por defecto
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
