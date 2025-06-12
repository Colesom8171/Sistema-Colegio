<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de importar el modelo User

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Laravel Auth::attempt espera un campo 'password' por defecto.
        // Como tu campo es 'contraseña', necesitamos verificarlo manualmente o
        // añadir un mutator en el modelo User para que 'password' se mapee a 'contraseña'.
        // Para simplificar aquí, realizamos la verificación manual si Auth::attempt falla por el nombre del campo.
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales inválidas.'],
            ]);
        }

        // Si la verificación manual es exitosa, autenticamos al usuario
        Auth::login($user);

        $token = $user->createToken('authToken')->plainTextToken; // 'authToken' es un nombre para el token

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user->load('role') // Incluye la información del rol del usuario
        ]);
    }

    public function logout(Request $request)
    {
        // Revoca todos los tokens del usuario autenticado
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }
}