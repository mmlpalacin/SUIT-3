<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Anuncio;
use App\Http\Requests\AnuncioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Curso;

class CrearAnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.anuncio.index')->only('index');
        $this->middleware('can:admin.anuncio.create')->only('create', 'store');
        $this->middleware('can:admin.anuncio.edit')->only('edit', 'update');
        $this->middleware('can:admin.anuncio.destroy')->only('destroy');
    }
    public function index (){
        return view('anuncios.index');
    }

    public function create (Anuncio $anuncio){
        $user_id = Auth::id();
        $cursos = Curso::whereHas('asignaciones', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        
        return view('anuncios.create', compact('cursos'));
    }
    
    public function store (AnuncioRequest $request){
        $anuncio = Anuncio::create($request->all());
        
        if($anuncio->status==2){
            $anuncio->published_at = now();
        }
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar como imagen, máximo 2MB
        ]);
        if ($request->hasFile('image')) {
            // Crear una instancia de la imagen y asociarla con el anuncio
            $image = new Image([
                'url' => $request->file('image')->store('public/anuncio'),
                'imageable_id' => $anuncio->id,
                'imageable_type' => Anuncio::class
            ]);

            $anuncio->image()->save($image);
        }
        $anuncio->save();
        return redirect()->route('admin.anuncio.index')->with('info', 'El anuncio se creo con exito');
    }

    public function edit (Anuncio $anuncio) 
    {
        $this->authorize('author', $anuncio);
        
        $user_id = Auth::id();
        $cursos = Curso::whereHas('asignaciones', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        return view('anuncios.edit', compact('anuncio', 'cursos'));
    }
    public function update(AnuncioRequest $request, Anuncio $anuncio)
    {
        $this->authorize('author', $anuncio);

        $anuncio->update($request->except('image'));
        
        if($anuncio->status==2){
            $anuncio->published_at = now();
        }
        
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar como imagen, máximo 2MB
        ]);
        
        if ($request->hasFile('image')) {
            if($anuncio->image){
                Storage::delete($anuncio->image->url);

                $anuncio->image->update([
                    'url' => $request->file('image')->store('public/anuncio')
                ]);
            }else{
                $anuncio->image()->create([
                    'url' => $request->file('image')->store('public/anuncio'),
                    'imageable_id' => $anuncio->id,
                    'imageable_type' => Anuncio::class
                ]);
            }
        }
        $anuncio->save();
        return redirect()->route('admin.anuncio.index')->with('info','El anuncio se actualizo con exito');
    }

    public function destroy (Anuncio $anuncio)
    {
        $this->authorize('author', $anuncio);

        $anuncio->delete();
        
        return redirect()->route('admin.anuncio.index')->with('info','El anuncio se elimino con exito');
    }
}
