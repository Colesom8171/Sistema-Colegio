<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    public $timestamps = false;
    protected $fillable = ['estudiante_id', 'curso_id', 'nota', 'fecha'];

    public function estudiante() { return $this->belongsTo(User::class, 'estudiante_id'); }
    public function curso() { return $this->belongsTo(Curso::class, 'curso_id'); }
}