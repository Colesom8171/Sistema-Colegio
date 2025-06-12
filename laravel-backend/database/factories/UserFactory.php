<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role; // Importa el modelo Role si lo vas a usar aquí

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Asegúrate de que Role::first() no sea nulo si lo usas
        // Si no usas factories, puedes ignorar esta sección.
        $defaultRoleId = Role::where('nombre', 'estudiante')->first()?->id ?? 1; // Asigna un rol existente o 1 como fallback

        return [
            'nombre' => fake()->name(), // CAMBIADO: de 'name' a 'nombre'
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(), // COMENTADO o ELIMINADO si no existe en tu migración
            'contraseña' => static::$password ??= Hash::make('password'), // CAMBIADO: de 'password' a 'contraseña'
            // 'remember_token' => Str::random(10), // COMENTADO o ELIMINADO si no existe en tu migración
            'rol_id' => $defaultRoleId, // AÑADIDO: para asignar un rol
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            // 'email_verified_at' => null, // COMENTADO o ELIMINADO
        ]);
    }
}