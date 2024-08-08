<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion_de_Cursos extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'user_id', 'rol'];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
