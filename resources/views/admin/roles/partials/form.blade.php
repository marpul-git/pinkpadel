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

@foreach ($permissions->chunk(ceil($permissions->count() / 2)) as $chunk)
<div class="row">
    @foreach ($chunk as $permission)
    <div class="col-md-6">
        <label>
            <input type="checkbox" id="permissions_{{ $permission->id }}" name="permissions[]"
                value="{{ $permission->id }}" class="mr-1"
                {{ isset($selectedPermissions) && in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
            <label for="permissions_{{ $permission->id }}">{{ $permission->description }}</label>
        </label>
    </div>
    @endforeach
</div>
@endforeach
{{--  En una columna
@foreach ($permissions as $permission)
    <div>
        <label>
        
            <input type="checkbox" id="permissions_{{ $permission->id }}" name="permissions[]"
                value="{{ $permission->id }}" class="mr-1"
                {{ isset($selectedPermissions) && in_array($permission->id, $selectedPermissions) ? 'checked' : '' }}>
            <label for="permissions_{{ $permission->id }}">{{ $permission->description }}</label>

        </label>
    </div>
@endforeach
--}}