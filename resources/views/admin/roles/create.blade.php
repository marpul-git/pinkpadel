@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class='card'>

        <div class='card-body'>
            {{--
            {!! Form::open(['route' => 'admin.roles.store']) !!}

           @include('admin.roles.partials.form')
            

            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
                --}}

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf <!-- Agrega el campo de token CSRF para protección contra ataques CSRF -->

                @include('admin.roles.partials.form')

                <button type="submit" class="btn btn-primary">Crear Rol</button>
            </form>



        </div>
        <div class="card-footer mt-2">
            <a class="btn btn-success " href="{{ route('admin.roles.index') }}">Listado de roles</a>
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
