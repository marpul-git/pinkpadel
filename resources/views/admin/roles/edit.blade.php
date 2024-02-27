@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')


    <div class='card'>
       
            @if (session('info'))
                <div class="card-header alert alert-success">
                    <strong>{{ session('info') }}</strong>
                </div>
            @endif
        

        <div class='card-body'>
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT') <!-- Agrega el método PUT para la actualización -->

                <div class="form-group">
                    {{--
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
                          --}}
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" value=" {{ $role->name }}"
                        class="form-control col-4" placeholder="Ingrese el nombre del rol">


                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <h2 class="h3">Lista de permisos</h2>
                <div class=" row">
                    @foreach ($permissions as $permission)
                        <div class="col-3 ">
                            <label>
                                <input type="checkbox" id="permissions_{{ $permission->id }}" name="permissions[]"
                                    value="{{ $permission->id }}" class="mr-1"
                                    {{ isset($selectedPermissions) && in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
                                <label for="permissions_{{ $permission->id }}">{{ $permission->description }}</label>

                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Rol</button>
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
