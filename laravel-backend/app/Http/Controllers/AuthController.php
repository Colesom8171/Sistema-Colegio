<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => \Hash::make($validated['password']),
            'rol_id' => 1, // O el rol que desees por defecto
        ]);

        // Puedes retornar el usuario o un token si usas JWT/Sanctum
        return response()->json(['message' => 'Usuario registrado correctamente', 'user' => $user], 201);
    }
}
