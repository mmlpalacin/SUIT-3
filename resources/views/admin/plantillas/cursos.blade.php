<body>
    <div class="card">
        <div class="card-body">
        @yield('form')
            <div class="form-group">
                <x-label for="name">Curso</x-label>
                    1<input type="radio" name="name" value="1" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '1') checked @endif>
                    2<input type="radio" name="name" value="2" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '2') checked @endif>
                    3<input type="radio" name="name" value="3" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '3') checked @endif>
                    4<input type="radio" name="name" value="4" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '4') checked @endif>
                    5<input type="radio" name="name" value="5" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '5') checked @endif>
                    6<input type="radio" name="name" value="6" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '6') checked @endif>
                    7<input type="radio" name="name" value="7" class="mr-4 ml-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" @if (old('name', $curso->name ?? '') == '7') checked @endif>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div class="form-group">
                <x-label for="especialidad">Especialidad</x-label>
                <select name="especialidad_id">
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}" @if(old('especialidad', $curso->especialidad_id ?? '') == $especialidad->id) selected @endif>{{ $especialidad->name }}</option>
                    @endforeach
                </select>
                @error('especialidad_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div class="form-group">
                <x-label for="division">Division</x-label>
                @foreach ($divisiones as $division)
                    {{$division->name}}
                    <input type="radio" name="division_id" id="division_id" value="{{$division->id}}" @if (old('division_id', $curso->division_id ?? '') == $division->id) checked @endif class="border-gray-300 ml-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-4">
                    @endforeach
                @error('division_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <br>

            <div class="form-group">
                <x-label for="turno">Turno</x-label>
                Mañana<input type="radio" id="turno1" name="turno" value="1" class="border-gray-300 ml-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-4" @if(old('turno', $curso->turno ?? '') == '1') checked @endif>
                Tarde<input type="radio" id="turno2" name="turno" value="2" class="border-gray-300 ml-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-4" @if(old('turno', $curso->turno ?? '') == '2') checked @endif>
                Noche<input type="radio" id="turno3" name="turno" value="3" class="border-gray-300 ml-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-4" @if(old('turno', $curso->turno ?? '') == '3') checked @endif>
            </div>

            <br>

            <div class="form-group">
                <x-label for="preceptor">Preceptor</x-label>
                <select id="preceptor" name="user_id">
                    @foreach ($preceptores as $preceptor)
                        <option value="{{ $preceptor->id }}" @if(old('preceptor', $curso->user_id ?? '') == $preceptor->id) selected @endif>{{ $preceptor->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</body>           