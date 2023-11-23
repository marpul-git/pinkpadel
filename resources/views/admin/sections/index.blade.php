@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')


    <h1>Mostrar secciones horarias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class='card'>
        <div class="card-header ">

     {{--       @can('admin.courts.create') --}}

            <a class="btn btn-success float-right" href="{{ route('admin.sections.create') }}">Agregar sección</a>


       {{--       @endcan    --}}

        </div>
        <div class='card-body'>
            <table class="table table-striger">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->start_time }}</td>
                            <td>{{ $section->end_time }}</td>
                            <td width="10px">
                             {{--     @can('admin.courts.edit') --}}
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.sections.edit', $section) }}">
                                    Editar</a>
                                {{--       @endcan    --}}

                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.sections.destroy', $section) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                {{--     @can('admin.courts.destroy')   --}}
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    {{--       @endcan    --}}
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop