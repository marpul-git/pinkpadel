@extends('adminlte::page')

@section('title', 'Crear Pista')

@section('content_header')
    <h1>Crear nueva pista</h1>
@stop

@section('content')
    <div class='card'>
        {{--
                <div class="card-header">
                    <a class="btn btn-success " href="{{ route('admin.courts.create') }}">Agregar Pista</a>
                </div>
            --}}
        <div class='card-body'>

            <form action="{{ route('admin.courts.store') }}" method="POST">
                @csrf
            
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre de la pista" value="{{ old('name') }}" />
            
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="Ingrese el tipo de pista" value="{{ old('type') }}" />
            
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Crear pista</button>
            </form>
            

        </div>
        <div class="card-footer">
            <a class="btn btn-success " href="{{ route('admin.courts.index') }}">Listado de pistas</a>
        </div>
    </div>
@stop
{{--
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
--}}