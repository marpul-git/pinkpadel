@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de eventos</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>

@endif

    @livewire('admin.events-index')
    
    
@stop