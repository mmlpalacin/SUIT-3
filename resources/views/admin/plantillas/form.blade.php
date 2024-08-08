<style>.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
form {
    margin-bottom: 20px;
}
.post {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;

}</style>

<body>
@yield('form')
    @csrf
    @yield('method')

    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

    <div class="post">
        <input type="text" name="title" id="title" placeholder="Titulo..." value="{{ old('title', $anuncio->title ?? '') }}">
        @error('title')
            <small class="text-red">{{$message}}</small>
        @enderror
    </div>

    <div class="post">
        <textarea name="body" id="body" placeholder="Anuncio...">{{ old('body', $anuncio->body ?? '') }}</textarea>
        @error('body')
            <small class="text-red">{{$message}}</small>
        @enderror
    </div>

    <div class="post" style="display: flex">
        <br>
            <x-label for="image">Selecciona una imagen:</x-label>
            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event, '#imgPreview')" style="border: none">
        @isset($anuncio->image)
            <img style="max-width: 200px;vertical-align: middles;" src="{{Storage::url($anuncio->image->url)}}">
        @endisset
    </div>

    <div>
        <br>
        <h3>Estado:</h3>
        <div class="post">
        <x-label for="status1">Borrador</x-label>
        <input type="radio" id="status1" name="status" value="1" @if(old('status', $anuncio->status ?? '') === '1') checked @else checked @endif>
        <x-label for="status2">Publicar</x-label>
        <input type="radio" id="status2" name="status" value="2" @if(old('status', $anuncio->status ?? '') === '2') checked @endif>
        @error('status')
            <small class="text-red">{{$message}}</small>
        @enderror
        </div>
    </div>
    <br>
        <button type="submit" style="padding: 10px 20px;background-color: #28a745;color: #fff;border: none;border-radius: 5px;cursor: pointer;">Crear Anuncio</button>
</body>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

    function previewImage(event, querySelector){

        const input = event.target;//Recuperamos el input que desencadeno la acción
        
        $imgPreview = document.querySelector(querySelector);//Recuperamos la etiqueta img donde cargaremos la imagen
        
        if(!input.files.length) return// Verificamos si existe una imagen seleccionada

        file = input.files[0];//Recuperamos el archivo subido

        objectURL = URL.createObjectURL(file);//Creamos la url
            
        $imgPreview.src = objectURL; //Modificamos el atributo src de la etiqueta img
    }
</script>