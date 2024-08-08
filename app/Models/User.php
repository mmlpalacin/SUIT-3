<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'alumno_id');
    }

    public function boletines()
    {
        return $this->hasMany(Boletin::class, 'alumno_id');
    }
    public function anuncio(){
        return $this->hasMany(Anuncio::class);
    }
    public function Asignacion(){
        return $this->hasMany(Asignacion_de_Cursos::class);
    }
    public function scopeAlumnosPorCurso(Builder $query, $cursoId)
    {
        return $query->whereHas('asignacion', function ($query) use ($cursoId) {
            $query->where('curso_id', $cursoId)
                  ->where('rol', 'alumno');
        })->orderBy('lastname');
    }
    public function scopeProfesoresPorCurso(Builder $query, $cursoId)
    {
        return $query->whereHas('asignacion', function ($query) use ($cursoId) {
            $query->where('curso_id', $cursoId);
        })->whereHas('roles', function ($query) {
            $query->where('name', 'profesor');
        })->orderBy('lastname');
    }
}
