<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaEntregada extends Model
{
    use HasFactory;
    protected $table = 'tareas_entregadas';
    public $timestamps = false;
    protected $fillable = ['tarea_id', 'estudiante_id', 'archivo_url', 'fecha_entrega'];

    public function tarea() { return $this->belongsTo(Tarea::class, 'tarea_id'); }
    public function estudiante() { return $this->belongsTo(User::class, 'estudiante_id'); }
}