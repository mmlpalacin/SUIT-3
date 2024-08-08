<body>
<div class="card">
    <div class="card-body">
            <div class="form-group">
    @yield('form')
        @csrf
        @yield('method')
                <label for="name">Nombre del Rol</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name ?? '') }}" class="form-control" placeholder="Ingrese el nombre del Rol">            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror

        <h2>Lista de Permisos</h2>
            @foreach ($permissions as $permission)
                <div>
                    <label for="permissions[]">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                        @if(is_array(old('permissions', $role->permissions->pluck('id')->toArray())) && in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))) checked @endif class="rm-1">
                        <!--se obtienen todos los permisos asociados al rol en un array, Comprueba si el valor devuelto es un array, Comprueba si el ID del permiso actual está en el array y si lo esta lo marca-->
                        {{$permission->description}}
                    </label>
                </div>
            @endforeach
    </div>
</div>
</div>