<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Aplicamos el middleware para asegurarnos de que solo los administradores puedan acceder
    public function __construct()
    {
        // Se asegura de que solo los usuarios con el rol 'admin' puedan acceder a las rutas de este controlador
        $this->middleware(['role:admin']);
    }

    // Listar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Mostrar el formulario de creación de usuario
    public function create()
    {
        return view('admin.users.create');
    }

    // Almacenar el nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('status', 'Usuario creado con éxito.');
    }

    // Mostrar formulario para editar usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar los datos de usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index')->with('status', 'Usuario actualizado con éxito.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Asegúrate de no eliminar al admin actual u otros usuarios importantes
        if ($user->id != auth()->id()) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('status', 'Usuario eliminado con éxito.');
        }

        return redirect()->route('admin.users.index')->with('error', 'No puedes eliminarte a ti mismo.');
    }
}
