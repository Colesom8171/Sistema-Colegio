<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Importa el modelo Role

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'estudiante', 'profesor', 'director'];
        foreach ($roles as $roleName) {
            if (!Role::where('nombre', $roleName)->exists()) {
                Role::create(['nombre' => $roleName]);
            }
        }
    }
}