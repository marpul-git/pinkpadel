<div>
    <div class='card'>
        <div class="card-header">
            
            <input wire:model="search" class='form-control' placeholder="Ingrese nombre o email de usuario">   
            

        </div>
        @if ($users->count() > 0)
            
        
        <div class='card-body'>
            <table class="table table-striger">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                           
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">
                                    Editar</a>

                            </td>
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>

        <div class="card-footer">
            {{ $users->links() }}
        </div>
        @else
            <div class="card-body">
                <strong>No existen registros coincidentes</strong>
            </div>

        @endif

    </div>
</div>
