<table   class="table">
    <h1 class="h5 text-white bg-dark p-3">Datos del Alumno</h1>
    <tr>
    <th><label for="name">Nombre/s</label>
    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}>
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror</th>
    <th><label for="lastname">Apellido/s</label>
    <input type="text" name="lastname" id="laatname" value="{{ old('lastname', auth()->user()->lastname ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}>
        @error('lastname')
            <small class="text-danger">{{$message}}</small>
        @enderror</th>
        <th colspan="2"></th>
    </tr>
    <tr>
    <th><label for="domicilio">Domicilio</label>
    <input type="text" name="domicilio" id="domicilio" value="{{ old('domicilio', auth()->user()->domicilio ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}>
        @error('domicilio')
            <small class="text-danger">{{$message}}</small>
        @enderror</th>
    <th><label for="numero">N°</label>
        <input type="text" name="numero" id="numero" value="{{ old('numero', auth()->user()->numero ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}></th>
    <th><label for="piso">Piso</label>
        <input type="text" name="piso" id="piso" value="{{ old('piso', auth()->user()->piso?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}></th>
    <th><label for="torre">Torre</label>
        <input type="text" name="torre" id="torre" value="{{ old('torre', auth()->user()->torre ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}></th>
    <th><label for="dpto">Dpto</label>
        <input type="text" name="dpto" id="dpto" value="{{ old('dpto', auth()->user()->dpto ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}></th>
    <th><label for="entre_calles">Entre Calles</label>
        <input type="text" name="entre_calles" id="entre_calles" value="{{ old('entre_calles', auth()->user()->entre_calles ?? '') }}" class="form-control" {{ $editable ? '' : 'disabled' }}></th>
    </tr>
    </table>