<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;
use App\Models\Anuncio;

class AnuncioObserver
{
    public function deleting(Anuncio $anuncio): void
    {
        if ($anuncio->image){
            Storage::delete($anuncio->image->url);
        }
    }
}
