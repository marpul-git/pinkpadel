@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    <h1>Eventos por fecha</h1>
    
   
@stop

@section('content')


    <div>
        <div class='card'>
            {{-- dd($events) --}}
            <div class="card-header">
                {{--
                {!! Form::model($events, ['route' => 'admin.events.by-day-table', 'autocomplete' => 'off', 'method' => 'get']) !!}
                <label for="selectedDate">Seleccione una fecha:</label>
                <input type="date" name="selectedDate" value={{"$selectedDate"}} class="form-control ml-2 col-2">
                <button type="submit" class="btn btn-primary ml-2 mt-2">Ver planning</button>
                <button type="submit" formaction="{{ route('admin.events.by-day') }}" class="btn btn-primary ml-2 mt-2">Ver en lista</button>
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

            <div class='card-body'>

                @if ($events->count() > 0)
                    <table class="table table-striped">
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
                                <th colspan="2"></th>
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
                                       {{ $event->date}}
                                    </td>
                                    <td>
                                        @foreach ($event->sections as $index => $section)
                                            @if ($event->sections->count() > 1)
                                                @if ($index === 0)
                                                    {{ $section->start_time }} - {{-- Si es el primer registro, mostramos solo el start_time y guion --}}
                                                @elseif ($index === $event->sections->count() - 1)
                                                    {{ $section->end_time }} {{-- Si es el último registro, mostramos solo el end_time --}}
                                                @endif
                                            @else
                                                {{ $section->start_time }} - {{ $section->end_time }} {{-- Si hay solo un registro, mostramos start_time y end_time separados por guion --}}
                                            @endif
                                        @endforeach


                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.events.edit', $event) }}">
                                            Editar</a>
        
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                            @csrf
                                            @method('delete')
        
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        
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
            {{ $events->links() }}
        </div>


    </div>




@stop