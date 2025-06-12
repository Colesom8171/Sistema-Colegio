<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Puedes mantener esta línea si la tienes
use Illuminate\Database\Seeder;
// use App\Models\User; // Comenta o elimina si solo vas a usar RoleSeeder por ahora

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // SOLO DEJA ESTA LÍNEA POR AHORA
        $this->call([
            RoleSeeder::class,
        ]);

        // Asegúrate de que no hay líneas como estas descomentadas:
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // O como estas:
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class); // Si tienes un UserSeeder por defecto y no lo has modificado, coméntalo

    }
}