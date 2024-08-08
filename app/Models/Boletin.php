<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alumno()
    {
        return $this->belongsTo(User::class, 'alumno_id');
    }
}
