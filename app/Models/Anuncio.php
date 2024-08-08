<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //relacion 1 a muchos inversa
    public function user(){
        return $this->belongsTo(user::class);
    }

    //relacion 1 a 1 poli
    public function image (){
        return $this->morphOne(image::class, 'imageable');
    }
    
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
