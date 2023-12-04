<div class="form-group">
    {{--
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
      --}}
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del rol">


    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<h2 class="h3">Lista de permisos</h2>

@foreach ($permissions as $permission)
    <div>
        <label>
            {{--
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{ $permission->description }}
               --}}
            <input type="checkbox" id="permissions_{{ $permission->id }}" name="permissions[]"
                value="{{ $permission->id }}" class="mr-1"
                {{ isset($selectedPermissions) && in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
            <label for="permissions_{{ $permission->id }}">{{ $permission->description }}</label>

        </label>
    </div>
@endforeach
