<div>
    <div class='card bg-slate-500'>

        <div class="card-header">

            <form action="{{ route('admin.events.by-day-table') }}" method="get" autocomplete="off">
                @csrf
                <div class="container row align-items-end justify-between">
                    
                    <div class=" col-md-4 text-end">
                        <label for="selectedDate">Filtrar por fecha:</label>
                    </div>
                    <div class="col-md-2">

                        <input type="date" name="selectedDate" id="selectedDate" class="form-control "
                            value="{{ now()->format('Y-m-d') }}">
                    </div>

                    <div class="col-md-2 text-end">
                        <button type="submit" formaction="{{ route('admin.events.by-day') }}"
                            class="btn btn-info ml-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-justify" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                            </svg>
                            Ver listado
                        </button>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="submit" class="btn btn-info ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path
                                    d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                <path
                                    d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                            Ver planning
                        </button>
                    </div>
                    <div class=" col-md-2 text-end ">

                        @can('admin.events.create')
                            <a class="btn btn-success  mt-2 " href="{{ route('admin.events.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                                  </svg>
                                Nuevo Evento</a>
                        @endcan
                    </div>
                </div>
            </form>
           


        </div>
        <div class='card-body'>
            <table class="table table-striger" id="events">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Precio</th>
                        <th>Usuario</th>
                        <th>Pista</th>
                        <th>Fecha</th>
                        <th>Hora Inicio-Fin</th>
                        <th></th>
                        <th>

                        </th>
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
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}</td>
                            <td>
                                @foreach ($event->sections as $index => $section)
                                    @if ($event->sections->count() > 1)
                                        @if ($index === 0)
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->start_time)->format('H:i') }} - {{-- Si es el primer registro, mostramos solo el start_time y guion --}}
                                        @elseif ($index === $event->sections->count() - 1)
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $section->end_time)->format('H:i') }} {{-- Si es el último registro, mostramos solo el end_time --}}
                                        @endif
                                    @else
                                        {{ $section->start_time }} - {{ $section->end_time }}
                                        {{-- Si hay solo un registro, mostramos start_time y end_time separados por guion --}}
                                    @endif
                                @endforeach


                            </td>
                            <td width="10px">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.events.edit', $event) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>

                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-warning btn-sm"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>

        <div class="card-footer">
            {{-- $events->links() --}}
        </div>
    </div>
</div>
