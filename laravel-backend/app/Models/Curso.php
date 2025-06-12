<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    public $timestamps = false;
    protected $fillable = ['nombre', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }
    public function notas() { return $this->hasMany(Nota::class, 'curso_id'); }
    public function asistencias() { return $this->hasMany(Asistencia::class, 'curso_id'); }
    public function tareas() { return $this->hasMany(Tarea::class, 'curso_id'); }
}