@extends('adminlte::page')

@section('title', 'Tarifas')

@section('content_header')
    <h1>Listado de tarifas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class='card'>
        <div class="card-header ">

            {{--  @can('admin.tariffs.create')    --}}

                <a class="btn btn-success float-right" href="{{ route('admin.tariffs.create') }}">Agregar tarifa</a>

             {{--     @endcan   --}}

        </div>
        <div class='card-body'>
            <table class="table table-striger">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($tariffs as $tariff)
                        <tr>
                            <td>{{ $tariff->id }}</td>
                            <td>{{ $tariff->name }}</td>
                            <td>{{ $tariff->price }}</td>
                            <td width="10px">

                             {{--   @can('admin.tariffs.edit')   --}}

                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tariffs.edit', $tariff) }}">
                                        Editar</a>

                                {{--     @endcan   --}}

                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tariffs.destroy', $tariff) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                {{--    @can('admin.tariffs.destroy') --}}

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                                    {{--     @endcan   --}}
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

       {{-- @can('admin.users.edit') --}}


       <div class="card-footer">
        <form action="{{ route('admin.users.updateTariff') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <select name="user_id" id="user_id" class="form-control" placeholder="Seleccione un usuario">
                    @foreach ($users as $userId => $userName)
                        <option value="{{ $userId }}">{{ $userName }}</option>
                    @endforeach
                </select>
    
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label>Tarifas</label><br>
                @foreach ($tariffs as $tariff)
                    <div class="form-check">
                        <input type="radio" name="tariff_id" id="tariff_{{ $tariff->id }}" value="{{ $tariff->id }}" class="form-check-input">
                        <label for="tariff_{{ $tariff->id }}" class="form-check-label">{{ $tariff->name }}</label>
                    </div>
                @endforeach
    
                @error('tariff_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Actualizar Tarifa</button>
        </form>
    </div>
    


        {{--   @endcan   --}}

    </div>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop