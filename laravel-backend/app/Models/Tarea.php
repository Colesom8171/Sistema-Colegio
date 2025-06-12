<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    public $timestamps = false;
    protected $fillable = ['curso_id', 'descripcion', 'fecha_entrega'];

    public function curso() { return $this->belongsTo(Curso::class, 'curso_id'); }
    public function entregas() { return $this->hasMany(TareaEntregada::class, 'tarea_id'); }
}