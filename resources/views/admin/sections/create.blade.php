@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')
    <h1>Crear sección</h1>
@stop

@section('content')
    <div class='card'>
        <!--
                <div class="card-header">
                    <a class="btn btn-success " href="{{ route('admin.courts.create') }}">Agregar Pista</a>
                </div>
            -->
        <div class='card-body'>

           

            <form action="{{ route('admin.sections.store') }}" method="POST">
                @csrf
            
                @include('admin.sections.partials.form')
            
                <button type="submit" class="btn btn-primary">Crear sección</button>
            </form>
            
        
             {{--

            {!! html()->form('POST', route('admin.sections.store')) !!}
            

            @include('admin.sections.partials.form')

            {!! html()->button('Crear sección')->type('submit')->class('btn btn-primary') !!}
            
            {{ html()->form()->close() }}  

              --}}  
        </div>
    </div>
@stop