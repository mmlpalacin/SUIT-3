<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'alumno_id', 'date', 'estado'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alumno()
    {
        return $this->belongsTo(User::class, 'alumno_id');
    }

}
