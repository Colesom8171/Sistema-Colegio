<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users'; // Especifica el nombre de la tabla
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
    ];
    protected $hidden = [
        'password', // Oculta la contraseña al serializar el modelo
    ];

    // Relación: Un usuario pertenece a un rol
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    // Otras relaciones para usuario (profesor, estudiante)
    public function cursosImpartidos() { return $this->hasMany(Curso::class, 'profesor_id'); }
    public function notas() { return $this->hasMany(Nota::class, 'estudiante_id'); }
    public function asistencias() { return $this->hasMany(Asistencia::class, 'estudiante_id'); }
    public function tareasEntregadas() { return $this->hasMany(TareaEntregada::class, 'estudiante_id'); }
}