@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar evento</h1>
@stop

@section('content')
    <div class='card'>

        <div class='card-body'>

            <form action="{{ route('admin.events.update', $event) }}" method="POST" autocomplete="off">
                @csrf
                @method('put')
            
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date" class="form-control col-2" value="{{ $event->date }}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            <!----------------------------------------------------------------------->

            <div>
                <div class="row">
                    <div class="form-group ml-2">
                        <label for="type">Tipo</label>
                        <select name="type" id="type" class="form-control col-8" placeholder="Seleccione el tipo de evento">
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
                    
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <select name="state" id="state" class="form-control col-8" placeholder="Seleccione el estado del evento">
                            <option value="RESERVADO">RESERVADO</option>
                            <option value="ALQUILADO">ALQUILADO</option>
                            <option value="FIN">FIN</option>
                        </select>
                        
                        @error('state')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" value="{{$event->price}}" id="price" class="form-control col-6" placeholder="€" step="0.01">
                        
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="court_id">Pista</label>
                        <select name="court_id" id="court_id" class="form-control col-12">
                            @foreach ($courts as $courtId => $court)
                                <option value="{{ $courtId }}" {{ $event->court_id == $courtId ? 'selected' : '' }}>{{ $court }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control col-2">
                        @foreach ($users as $userId => $userName)
                            <option value="{{ $userId }}">{{ $userName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!----------------------------------------------------------------------->
                <div class="form-group ml-3">
                    <label for="section_id">Secciones</label><br>
                    <div class="row">
                        
                        @foreach ($allSections as $sectionId => $section)
                            <div class="col-md-4">
                                <label class="form-check-label">
                                    @php
                                        $isChecked = in_array($sectionId, $event->sections->pluck('id')->toArray());
                                    @endphp
                                    <input type="checkbox" name="section_id[]" value="{{ $sectionId }}" class="form-check-input" {{ $isChecked ? 'checked' : '' }}>
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $section['start_time'])->format('H:i') }}
                                    - {{ \Carbon\Carbon::createFromFormat('H:i:s',$section['end_time'])->format('H:i') }}
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
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ $event->player->user1_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                            @endforeach
                        </select>
                        @error('user1_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="user2_id">Jugador 2</label>
                        <select name="user2_id" id="user2_id" class="form-control" placeholder="Seleccione un jugador">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ $event->player->user2_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="user3_id">Jugador 3</label>
                        <select name="user3_id" id="user3_id" class="form-control" placeholder="Seleccione un jugador">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ $event->player->user3_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="user4_id">Jugador 4</label>
                        <select name="user4_id" id="user4_id" class="form-control" placeholder="Seleccione un jugador">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}" {{ $event->player->user4_id == $userId ? 'selected' : '' }}>{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Actualizar evento</button>
            </form>
            
        </div>


    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop