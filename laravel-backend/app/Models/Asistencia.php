<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencia';
    public $timestamps = false;
    protected $fillable = ['estudiante_id', 'curso_id', 'fecha', 'presente'];

    public function estudiante() { return $this->belongsTo(User::class, 'estudiante_id'); }
    public function curso() { return $this->belongsTo(Curso::class, 'curso_id'); }
}