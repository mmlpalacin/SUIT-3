<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'division_id', 'especialidad_id'];

    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }
    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion_de_Cursos::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function boletines()
    {
        return $this->hasMany(Boletin::class);
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }
}
