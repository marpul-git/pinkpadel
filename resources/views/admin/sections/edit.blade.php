@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')
    <h1>Editar sección</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
   
<div class='card'>
    
                    
    <div class='card-body'>


        {{--
        {!! Form::Model($section,['route' => ['admin.sections.update',$section],'method'=>'put']) !!}

        @include('admin.sections.partials.form')

        {!! Form::submit('Actualizar sección', ['class'=>'btn btn-primary ']) !!}

        {!! Form::close() !!}
            --}}

            <form action="{{ route('admin.sections.update', $section) }}" method="POST">
                @csrf
                @method('put')
            
                @include('admin.sections.partials.form')
            
                <button type="submit" class="btn btn-primary">Actualizar sección</button>
            </form>
            
    </div>
    
</div>
</div>
<div class="card-footer">
    <a class="btn btn-success " href="{{ route('admin.sections.index') }}">Listado de secciones</a>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop