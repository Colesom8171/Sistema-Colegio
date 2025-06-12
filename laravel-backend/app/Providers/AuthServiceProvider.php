<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Asegúrate de importar el modelo User

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Aquí podrías definir tus Policies más adelante si la lógica de autorización se vuelve compleja
    ];

    public function boot(): void
    {
        // Gate para acceso de administradores y directores
        Gate::define('admin-director-access', function (User $user) {
            return $user->role->nombre === 'admin' || $user->role->nombre === 'director';
        });

        // Gate para acceso de profesores (incluye admin y director)
        Gate::define('profesor-access', function (User $user) {
            return $user->role->nombre === 'admin' || $user->role->nombre === 'director' || $user->role->nombre === 'profesor';
        });

        // Gate para acceso de estudiantes
        Gate::define('student-access', function (User $user) {
            return $user->role->nombre === 'estudiante';
        });

        // Ejemplo de Gate para ver datos propios (ej. notas, asistencia)
        // Se pasa el modelo afectado como segundo argumento
        Gate::define('view-own-data', function (User $user, $model) {
            // Un usuario puede ver sus propios datos
            if ($user->id === $model->estudiante_id) {
                return true;
            }
            // Admin, director o profesor también pueden ver los datos de cualquier estudiante
            return $user->role->nombre === 'admin' || $user->role->nombre === 'director' || $user->role->nombre === 'profesor';
        });
    }
}