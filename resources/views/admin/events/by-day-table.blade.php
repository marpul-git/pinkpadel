@extends('adminlte::page')

@section('title', 'Planning')

@section('content_header')
    <h1>Eventos del día: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $selectedDate)->format('d-m-Y') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{--
            {!! Form::open(['route' => 'admin.events.by-day-table', 'autocomplete' => 'off', 'method' => 'get']) !!}
            <label for="selectedDate">Seleccione una fecha:</label>
            <input type="date" name="selectedDate" value={{ "$selectedDate" }} class="form-control ml-2 col-2">
            <button type="submit" class="btn btn-primary ml-2 mt-2">Ver planning</button>
            <button type="submit" formaction="{{ route('admin.events.by-day') }}" class="btn btn-primary ml-2 mt-2">Ver en
                lista</button>
            <a class="btn btn-info  float-center mt-2 ml-3" href="{{ route('admin.events.index') }}">
                Volver a todos los eventos</a>
            {!! Form::close() !!}
            --}}   
            <form action="{{ route('admin.events.by-day-table') }}" method="get" autocomplete="off">
                @csrf
            
                <label for="selectedDate">Seleccione una fecha:</label>
                <input type="date" name="selectedDate" value="{{ $selectedDate }}" class="form-control ml-2 col-2">
            
                <button type="submit" class="btn btn-primary ml-2 mt-2">Ver planning</button>
            
                <button type="submit" formaction="{{ route('admin.events.by-day') }}" class="btn btn-primary ml-2 mt-2">
                    Ver en lista
                </button>
            
                <a class="btn btn-info float-center mt-2 ml-3" href="{{ route('admin.events.index') }}">
                    Volver a todos los eventos
                </a>
            </form>
            


        </div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Sección</th>
                        @foreach ($courts as $court)
                            <th>{{ $court->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                            </td>
                            @foreach ($courts as $court)
                                <td>
                                    @if ($eventData[$section->id][$court->id] === 'Libre')
                                        <a class="btn btn-success btn-sm btn-create-event"
                                            data-court-id="{{ $court->id }}" data-section-id="{{ $section->id }}"
                                            href="#">Libre</a>
                                    @else
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.events.edit', $eventData[$section->id][$court->id]) }}">
                                            {{ $eventData[$section->id][$court->id]->type }}<br>{{ $eventData[$section->id][$court->id]->user->name }}
                                        </a>
                                    @endif

                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // Para que se cargue en el formulario
        // Capturamos el clic en el enlace "Libre"
        document.querySelectorAll('.btn-create-event').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Obtenemos los datos de pista y sección desde los atributos de datos
                const courtId = this.getAttribute('data-court-id');
                const sectionId = this.getAttribute('data-section-id');

                // Creamos el formulario para enviar los datos
                const form = document.createElement('form');
                form.method = 'GET';
                form.action = '{{ route('admin.events.create') }}';

                // Creamos el input para enviar los datos de pista y sección
                const courtInput = document.createElement('input');
                courtInput.type = 'hidden';
                courtInput.name = 'court_id';
                courtInput.value = courtId;
                form.appendChild(courtInput);

                const sectionInput = document.createElement('input');
                sectionInput.type = 'hidden';
                sectionInput.name = 'section_id';
                sectionInput.value = sectionId;
                form.appendChild(sectionInput);

                // Agregamos el formulario a la página y lo enviamos automáticamente
                document.body.appendChild(form);
                form.submit();
            });
        });
    </script>

@stop