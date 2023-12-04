@extends('adminlte::page')

@section('title', 'Eventos del dia')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@stop

@section('content_header')

    <h1>Eventos por fecha</h1>


@stop

@section('content')


    <div>
        <div class='card'>
            {{-- dd($events) --}}
            <div class="card-header">

                <form action="{{ route('admin.events.by-day-table') }}" method="get" autocomplete="off">
                    @csrf

                    <div class="container row align-items-end ">
                        <div class=" col-md-2 ">
                            
                            <a class="btn btn-primary  mt-2 " href="{{ route('admin.events.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                              </svg>
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

            <div class='card-body'>

                @if ($events->count() > 0)
                    <table class="table table-striped" id="events_by_day">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Usuario</th>
                                <th>Pista</th>
                                <th>Fecha</th>
                                <th>Inicio-Fin</th>
                                <th></th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->type }}</td>
                                    <td>{{ $event->state }}</td>
                                    <td>{{ $event->price }}</td>
                                    <td>{{ $event->user->name }}</td>
                                    <td>{{ $event->court->name }}</td>

                                    <td>
                                        {{ $event->date }}
                                    </td>
                                    <td>
                                        @foreach ($event->sections as $index => $section)
                                            @if ($event->sections->count() > 1)
                                                @if ($index === 0)
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }} - {{-- Si es el primer registro, mostramos solo el start_time y guion --}}
                                                @elseif ($index === $event->sections->count() - 1)
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }} {{-- Si es el último registro, mostramos solo el end_time --}}
                                                @endif
                                            @else
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }}
                                                {{-- Si hay solo un registro, mostramos start_time y end_time separados por guion --}}
                                            @endif
                                        @endforeach


                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.events.edit', $event) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                              </svg>
                                        </a>

                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                  </svg>
                                            </button>

                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <p>No hay eventos para la fecha seleccionada.</p>
                @endif

            </div>
        </div>

        <div class="card-footer">
            {{-- $events->links() --}}
        </div>


    </div>




@stop

@section('js')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>


    <script>
        new DataTable('#events_by_day', {
            responsive: true,
            autoWidth: false,
            ordering: false,
            "language": {
                "lengthMenu": "Mostrar " +
                    `<select >
                <option value = '10'>10</option>
                <option value = '25'>25</option>
                <option value = '50'>50</option>
                <option value = '100'>100</option>
                <option value = '-1'>All</option>    
            </select>` +
                    " registros por página",
                "zeroRecords": "Ningún registro coincidente.Disculpa",
                "info": "Mostrando página _PAGE_ de _PAGES_ (Filtrado de _MAX_ registros totales)",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }

            }
        });
    </script>

@stop
