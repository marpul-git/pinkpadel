@extends('adminlte::page')

@section('title', 'Tarifas')

@section('content_header')
    <h1>Crear nueva tarifa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.tariffs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control col-2" placeholder="Ingrese el nombre" value="{{ old('name') }}" />
            
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control col-2" placeholder="€" step="0.01" value="{{ old('price') }}" />
            
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear tarifa</button>
        </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop