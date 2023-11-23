@extends('adminlte::page')

@section('title', 'Panel de Administración')

@section('content_header')
    <h1>Panel de Administración</h1>
@stop

@section('content')
    <p>Bienvenidos al Panel de Administración.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop