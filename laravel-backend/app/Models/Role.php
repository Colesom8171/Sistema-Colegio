<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles'; // Especifica el nombre de la tabla
    public $timestamps = false; // Desactiva los timestamps si no los usas en la tabla
    protected $fillable = ['nombre']; // Campos que se pueden asignar masivamente

    // Relación: Un rol tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}