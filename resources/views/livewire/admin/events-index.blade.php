<div>
   <div class='card'>
       
       <div class="card-header">
           <div>
           
            <div>
               
               <form  method="GET" autocomplete="off" >
                @csrf
                <label for="selectedDate">Buscar por fecha:</label>
                <input type="date" name="selectedDate" id="selectedDate" class="form-control ml-2 col-4" value="{{ now()->format('Y-m-d') }}">
                
                <button type="submit" class="btn btn-primary ml-2 mt-2" formaction="{{ route('admin.events.by-day',$events) }}">Pulsa para ver listado</button>
                <button type="submit" class="btn btn-primary ml-2 mt-2" formaction="{{ route('admin.events.by-day-table',$events) }}">Pulsa para ver planning</button>
            </form>
            
           </div>
           
           </div>

       </div>
       <div class='card-body'>
           <table class="table table-striger">
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
                       <th colspan="2">
                         {{--   @can('admin.courts.create')--}} 
        <a class="btn btn-success float-right" href="{{route('admin.events.create')}}">Crear Evento</a>
        {{--    @endcan  --}} 
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


       </div>

       <div class="card-footer">
           {{$events->links()}}
       </div>
   </div>
</div>