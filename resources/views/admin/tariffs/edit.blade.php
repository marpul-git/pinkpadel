@extends('adminlte::page')

@section('title', 'Tarifas')

@section('content_header')
    <h1>Editar tarifa</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
<div class='card'>
    
    <div class="card-body">
        <form action="{{ route('admin.tariffs.update', $tariff) }}" method="POST">
            @csrf
            @method('put')
    

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control col-2" placeholder="Ingrese el nombre" value="{{ old('name', $tariff->name) }}" />
        
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" class="form-control col-2" placeholder="€" step="0.01" value="{{ old('price', $tariff->price) }}" />
        
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
            <button type="submit" class="btn btn-primary">Actualizar tarifa</button>
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