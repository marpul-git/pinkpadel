@extends('adminlte::page')

@section('title', 'Planning')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@stop

@section('content_header')
    <h1>Eventos del día: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $selectedDate)->format('d-m-Y') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        
            <form action="{{ route('admin.events.by-day-table') }}" method="get" autocomplete="off">
                @csrf

                <div class="container row align-items-end ">
                    <div class=" col-md-2 ">
                        <a class="btn btn-primary  mt-2 " href="{{ route('admin.events.index') }}">
                            Todos los eventos
                        </a>
                    </div>
                    <div class=" col-md-4 text-end">
                        <label for="selectedDate">Elige una fecha y pulsa 1 de las 2 opciones:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="selectedDate" class="form-control" value="{{ $selectedDate }}">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="submit" class="btn btn-primary  ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                              </svg>
                            Ver planning
                        </button>
                    </div>
                    
                    <div class="col-md-2 text-end">
                        <button type="submit" formaction="{{ route('admin.events.by-day') }}"
                            class="btn btn-primary ml-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                              </svg>
                            Ver listado
                        </button>
                    </div>
                    

                </div>
            </form>
            


        </div>
        <div class="card-body">
            <table class="table table-striped " id="planning">
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

@section('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

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
    <script>
        new DataTable('#planning', {
            responsive: true,
            autoWidth: false,
            ordering: false,
            searching: false,
            lengthChange:false,
            pageLength: 14,
            "language": {
            "lengthMenu": "Mostrar " + 
            `<select >
                
                <option value = '10'>10</option>
                <option value = '14'>14</option>
                <option value = '25'>25</option>
                <option value = '-1'>All</option>
                    
            </select>` +
            " registros por página",
            "zeroRecords": "Ningún registro coincidente.Disculpa",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Tarde",
                "previous": "Mañana"
            }
    
        }
        });
    </script>

@stop