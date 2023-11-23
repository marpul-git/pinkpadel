@extends('adminlte::page')

@section('title', 'Listado de Pistas')

@section('content_header')
    <h1>Listado de pistas</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>

@endif
<div class='card'>
    <div class="card-header">
   
    </div>
    <div class='card-body'>
        <table class="table table-striger">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th colspan="2">
                         {{--   @can('admin.courts.create')--}} 
        <a class="btn btn-success float-right" href="{{route('admin.courts.create')}}">Agregar Pista</a>
        {{--    @endcan  --}} 
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach ($courts as $court)
                <tr>
                    <td>{{$court->id}}</td>
                    <td>{{$court->name}}</td>
                    <td>{{$court->type}}</td>
                    <td width="10px">
                        {{--  @can('admin.courts.create') --}} 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.courts.edit',$court)}}"> Editar</a>
                         {{--    @endcan  --}} 
                    </td>
                    <td width="10px">
                       <form action="{{route('admin.courts.destroy',$court)}}" method="POST">
                        @csrf
                        @method('delete')
                        {{--  @can('admin.courts.create') --}} 
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        {{--    @endcan  --}} 
                       </form>

                    </td>
                </tr>
                    
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop