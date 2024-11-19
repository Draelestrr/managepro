<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Listar usuarios con sus roles.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return response()->json($users, 200);
    }

    /**
     * Crear un nuevo usuario con rol.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']); // Asignar el rol

        return response()->json(['message' => 'Usuario creado con éxito', 'data' => $user], 201);
    }

    /**
     * Mostrar detalles de un usuario.
     */
    public function show(User $user)
    {
        $user->load('roles');
        return response()->json($user, 200);
    }

    /**
     * Actualizar un usuario y su rol.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
        ]);

        $user->syncRoles([$validated['role']]); // Sincronizar roles (elimina los existentes y agrega el nuevo)

        return response()->json(['message' => 'Usuario actualizado con éxito', 'data' => $user], 200);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
